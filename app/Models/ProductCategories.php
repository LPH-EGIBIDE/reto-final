<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategories extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = [
        'product_id',
        'category_id',
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
