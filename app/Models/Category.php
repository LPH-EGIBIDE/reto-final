<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function product():HasMany
    {
        //get all products that belong to this category using the product_categories pivot table
        return $this->hasMany(ProductCategories::class);
    }



}
