<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DiscountCode extends Model
{
    use HasFactory;
    protected $table = 'discount_codes';
    protected $fillable = [
        'code',
        'user_left',
        'value',
        'value_type',
        'description',
        'is_active',
    ];

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
