<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
        'is_active',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails():HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function attachment():BelongsTo
    {
        return $this->belongsTo(Attachment::class);
    }
}
