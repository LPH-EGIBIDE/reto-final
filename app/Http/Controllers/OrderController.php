<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public static   $statuses = [
        'received' => ['Recibido', 'primary'],
        'processing' => ['En proceso', 'warning'],
        'prepaired' => ['Preparado', 'success'],
        'cancelled' => ['Cancelado', 'danger']
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $statuses = self::$statuses;
        $orders = Order::where('user_id', $id)->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('orders.index' , compact('orders', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $order = Order::findOrFail($id);
        $order->date = Carbon::parse($order->date)->format('d/m/Y');
        $pedidoCreado= Carbon::parse($order->created_at)->format('d/m/Y');
        return view('admin.order.show' , compact('order', 'pedidoCreado'));
    }

    public function showUser(int $id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show' , compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }


    public function api(Request $request){
        $request->validate([
            'id' => 'required|integer|exists:orders,id'
        ]);
        $order = Order::findOrFail($request->id);
        try{
            $this->authorize('view-order', $order);
        } catch (AuthorizationException $e){
            return response()->json(['errors' => ['auth' => 'No tienes permiso para ver este pedido']], 403);
        }
        $json = [
            'success' => true,
            'id' => $order->id,
            'user_id' => $order->user_id,
            'discount_code_id' => $order->discount_code_id,
            'subtotal' => round($order->subtotal, 2),
            'total' => round($order->total, 2),
            'status' => $order->status,
            'date' => Carbon::parse($order->date)->format('d/m/Y'),
            'discount_code' => $order->discountCode->code ?? null,
            'products' => []
        ];

        foreach ($order->orderDetails as $orderDetail) {
            $json['products'][] = [
                'name' => $orderDetail->product->name,
                'price' => $orderDetail->product->price,
                'quantity' => $orderDetail->quantity,
                'total' => round($orderDetail->quantity * $orderDetail->product->price, 2)
            ];
        }

        return response()->json($json);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function adminIndex()
    {
        return view('admin.order.index');
    }

    public function filter(Request $request)
    {
        $request->validate([
            'page' => 'nullable|integer',
            'filtro' => 'nullable|string|max:255',
        ]);

        $page = $request->page ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $pedidos = Order::leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->leftJoin('discount_codes', 'discount_codes.id', '=', 'orders.discount_code_id')
            ->where('users.name', 'like', "%{$request->filtro}%");
        $total = $pedidos->count();
        $pedidos = $pedidos->offset($offset)->limit($perPage)->select('users.name', 'discount_codes.code', 'orders.subtotal', 'orders.total', 'orders.status', 'orders.id as url')
            ->orderBy('name', 'asc')
            ->get();

        $pedidos->map(function($order){
            $order->url = route('admin.order.show', $order->url, false);
            $statuses = self::$statuses;
            $order->status = "<span class=\"badge badge-{$statuses[$order->status][1]} rounded-pill d-inline\">{$statuses[$order->status][0]}</span>";

            $order->code = $order->code ?? 'no utilizado';
        });

        $page = intval($page) > ceil($total / $perPage) ? ceil($total / $perPage) : $page;
        return response([
            'data' => $pedidos,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
        ], 200, [
            'Content-Type' => 'application/json',
        ], JSON_PRETTY_PRINT);
    }

    public function changeStatus(int $id, Request $request){
        $request->validate([
            'status' => 'required|string|in:received,processing,prepaired,cancelled'
        ], [
            'status.in' => 'El estado seleccionado no es válido'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        session()->flash('message', 'Estado actualizado correctamente');
        return redirect()->route('admin.order.show', $id);
    }

    public function stats()
    {
        $pedidos = Order::selectRaw('count(*) as pedidos, date(created_at) as fecha')
            ->groupBy('fecha')
            ->where('created_at', '>=', Carbon::now()->startOfWeek(Carbon::MONDAY))
            ->where('created_at', '<=', Carbon::now()->endOfWeek(Carbon::SUNDAY))
            ->orderBy('fecha', 'asc')

            ->get();

        $data = [];
        foreach ($pedidos as $pedido){
            //foreach every day of the week
            for($i = 0; $i < 7; $i++){
                $date = Carbon::now()->startOfWeek(Carbon::MONDAY)->addDays($i)->format('Y-m-d');
                if(!isset($data[$date])){
                    $data[$date] = 0;
                }
                if($pedido->fecha == $date){
                    $data[$date] = $pedido->pedidos;
                }
            }
        }
        //Remove the keys
        $data = array_values($data);
        return response()->json([
            'data' => $data
        ]);
    }
}
