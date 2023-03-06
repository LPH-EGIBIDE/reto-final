<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:10',
            'image' => 'required|image',
            'stock' => 'required|numeric|min:0',
            'categories' => 'required|exists:categories,id'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $file = $request->file('image');
        $attachment = AttachmentController::store($file, true);
        $product->image = $attachment->id;
        $product->save();


        foreach ($request->categories as $categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                $productCategory = new ProductCategories();
                $productCategory->product_id = $product->id;
                $productCategory->category_id = $category->id;
                $productCategory->save();
            }
        }

        session()->flash('message', 'Producto creado correctamente');
        return redirect()->route('admin.product.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.show' , compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:10',
            'image' => 'image',
            'stock' => 'required|numeric|min:0',
            'categories' => 'required|exists:categories,id'
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $file = $request->file('image');
        if ($file){
            $attachment = AttachmentController::store($file, true);
            if($product->attachment){
                AttachmentController::destroy($product->attachment);
            }
            $product->image = $attachment->id;
        }
        $product->save();

        // Delete all product categories
        $productCategories = $product->categories;
        foreach ($productCategories as $productCategory) {
            $productCategory->delete();
        }

        foreach ($request->categories as $categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                $productCategory = new ProductCategories();
                $productCategory->product_id = $product->id;
                $productCategory->category_id = $category->id;
                $productCategory->save();
            }
        }
        session()->flash('message', 'Producto actualizado con éxito');
        return redirect()->route('admin.product.show', $product->id);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        // Delete all product categories
        $productCategories = $product->categories;
        foreach ($productCategories as $productCategory) {
            $productCategory->delete();
        }

        // Delete product image
        $attachment = $product->attachment;
        $attachment->delete();

        // Delete product
        session()->flash('message', 'Producto eliminado con éxito');
        $product->delete();
    }
}
