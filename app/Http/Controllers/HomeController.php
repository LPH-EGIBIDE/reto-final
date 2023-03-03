<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('is_homepage', true)->get();
        $products = Product::where('is_homepage', true)->get();
        return view('welcome', compact('categories', 'products'));
    }
    public function admin()
    {
        return view('admin.index');
    }
}
