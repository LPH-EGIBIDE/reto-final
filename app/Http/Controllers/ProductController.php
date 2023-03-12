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
        $categories = Category::all();
        $count = Product::all();
        if (isset($_GET['category'])) {
            $products = Product::whereHas('categories', function ($query) {
                $query->where('category_id', $_GET['category']);
            })->with('categories')->get();
        } else {
            $products = Product::whereHas('categories')->with(['categories', 'attachment'])->get();
        }
        return view('products.index', compact('products', 'categories', 'count'));
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
        return redirect()->route('admin.product.adminIndex');


    }

    /**
    * Display the specified resource.
    */
    public function showUser(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $products = Product::all();
        $productCategories = $product->categories;
        $relatedProducts = $this->relatedProducts($product,3);
        return view('products.show' , compact('product', 'categories', 'products', 'productCategories', 'relatedProducts'));
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
            'categories' => 'required|exists:categories,id',
            'is_homepage' => 'boolean'
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->is_homepage = boolval($request->is_homepage);
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
        return redirect()->route('admin.product.index');
    }

    public function  adminIndex(){
        return view('admin.product.index');
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

        $productos = Product::where('name', 'like', '%'.$request->filtro.'%');
        $total = $productos->count();
        $productos = $productos->offset($offset)->limit($perPage)->select('name', 'price', 'stock', 'is_homepage','id as url')
            ->orderBy('name', 'asc')
            ->get();

        $productos->map(function($producto){
            $producto->url = route('admin.product.show', $producto->url, false);
            $producto->is_homepage = $producto->is_homepage ? 'Si' : 'No';
        });

        $page = intval($page) > ceil($total / $perPage) ? ceil($total / $perPage) : $page;
        return response([
            'data' => $productos,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
        ], 200, [
            'Content-Type' => 'application/json',
        ], JSON_PRETTY_PRINT);
    }
    public function relatedProducts(Product $product, $quantity = 3){
        $relatedProducts = Product::whereHas('categories', function ($query) use ($product) {
            $query->whereIn('category_id', $product->categories->pluck('category_id'));
        })->where('id', '!=', $product->id)->take($quantity)->get();
        return $relatedProducts;

    }
}
