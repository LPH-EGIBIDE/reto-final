<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attachment extends Model
{
    use HasFactory;
    protected $table = 'attachments';
    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'is_public'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
