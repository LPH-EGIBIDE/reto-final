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

    public function profile()
    {
        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( auth()->user()->email ) ) ) . "&s=300&time=".time();

        return view('user.index', ['user' => auth()->user(), 'grav_url' => $grav_url]);
    }
}
