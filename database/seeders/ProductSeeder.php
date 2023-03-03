<?php

namespace Database\Seeders;

use App\Models\ProductCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Generate 30 random products and attach random categories
        \App\Models\Product::factory(30)->create()->each(function ($product) {
            $categories = \App\Models\Category::all()->random(mt_rand(1, 5))->pluck('id');
            foreach ($categories as $category) {
                $productCategory = new ProductCategories();
                $productCategory->product_id = $product->id;
                $productCategory->category_id = $category;
                $productCategory->save();
            }
        });
    }
}
