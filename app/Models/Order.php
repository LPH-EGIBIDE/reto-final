<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'discount_code_id',
        'subtotal',
        'total',
        'status',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function discountCode():BelongsTo
    {
        return $this->belongsTo(DiscountCode::class);
    }

    public function orderDetails():HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }
}
