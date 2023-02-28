<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'type',
        'url',
        'dismissed'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
