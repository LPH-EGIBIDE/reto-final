<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $statuses = [
            'received' => ['Recibido', 'success'],
            'processing' => ['En proceso', 'light'],
            'prepaired' => ['Preparado', 'info'],
            'cancelled' => ['Cancelado', 'danger']
        ];  
        $orders = Order::where('user_id', $id)->get(); 
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
        return view('admin.order.show' , compact('order'));
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
}
