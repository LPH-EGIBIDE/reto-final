<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate the request data, is_homepage is a checkbox
        $request->validate([
            'name' => 'required|unique:categories',
            'is_homepage' => 'boolean',
            'image' => 'required|image'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->is_homepage = boolval($request->is_homepage);
        $file = $request->file('image');
        $attachment = AttachmentController::store($file, true);
        $category->attachment_id = $attachment->id;
        $category->save();

        session()->flash('message', 'Categoria creada correctamente');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'is_homepage' => 'boolean',
            'image' => 'image'
        ]);

        $category->name = $request->name;
        $category->is_homepage = boolval($request->is_homepage);
        $file = $request->file('image');
        if ($file) {
            $attachment = AttachmentController::store($file, true);
            if ($category->attachment) {
                AttachmentController::destroy($category->attachment);
            }
            $category->attachment_id = $attachment->id;
        }
        $category->save();

        session()->flash('message', 'Categoria actualizada correctamente');
        return redirect()->route('admin.category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        if ($category->attachment) {
            AttachmentController::destroy($category->attachment);
        }
        $category->delete();
        session()->flash('message', 'Categoria eliminada correctamente');
        return redirect()->route('admin.category.index');

    }
}
