<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:discount_codes',
            'uses_left' => 'required|numeric|min:0',
            'value' => 'required|numeric|min:0|max:100',
            'description' => 'required|min:10',
            'value_type' => 'required|in:percent,amount',

        ]);
        $discountCode = new DiscountCode();
        $discountCode->code = $request->code;
        $discountCode->uses_left = $request->uses_left;
        $discountCode->value = $request->value;
        $discountCode->description = $request->description;
        $discountCode->value_type = $request->value_type;
        $discountCode->save();
        session()->flash('message', 'Codigo de descuento creado correctamente');
        return redirect()->route('admin.discount.adminIndex');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $discountCode = DiscountCode::findOrFail($id);
        return view('admin.discount.show', compact('discountCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $discountCode = DiscountCode::findOrFail($id);
        return view('admin.discount.edit', compact('discountCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'code' => 'required|unique:discount_codes,code,'.$id,
            'uses_left' => 'required|numeric|min:0',
            'value' => 'required|numeric|min:0|max:100',
            'description' => 'required|min:10',
            'value_type' => 'required|in:percent,amount',
            'is_active' => 'boolean',
        ]);

        $discountCode = DiscountCode::findOrFail($id);
        $discountCode->code = $request->code;
        $discountCode->uses_left = $request->uses_left;
        $discountCode->value = $request->value;
        $discountCode->description = $request->description;
        $discountCode->value_type = $request->value_type;
        $request->is_active ? $discountCode->is_active = 1 : $discountCode->is_active = 0;
        $discountCode->save();

        session()->flash('message', 'Codigo de descuento actualizado correctamente');
        return redirect()->route('admin.discount.show', $discountCode->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $discountCode = DiscountCode::findOrFail($id);
        $discountCode->delete();
        session()->flash('message', 'Codigo de descuento eliminado correctamente');
        return redirect()->route('admin.discount.index');
    }
    public function activate(int $id){
        $discountCode = DiscountCode::findOrFail($id);
        $discountCode->is_active = 1;
        $discountCode->save();
        session()->flash('message', 'Codigo de descuento activado correctamente');
        return redirect()->route('admin.discount.show', $discountCode->id);
    }

    public function adminIndex(){
        return view('admin.discount.index');
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

        $codigos = DiscountCode::where('code', 'like', '%'.$request->filtro.'%');
        $total = $codigos->count();
        $codigos = $codigos->offset($offset)->limit($perPage)->select('code', 'uses_left', 'value', 'value_type', 'is_active', 'id as url')
            ->orderBy('code', 'asc')
            ->get();

        $codigos->map(function($codigo ){
            $codigo ->url = route('admin.discount.show', $codigo ->url, false);
            $codigo->is_active = boolval($codigo ->is_active) ? 'Si' : 'No';
        });


        $page = intval($page) > ceil($total / $perPage) ? ceil($total / $perPage) : $page;
        return response([
            'data' => $codigos,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
        ], 200, [
            'Content-Type' => 'application/json',
        ], JSON_PRETTY_PRINT);
    }

}
