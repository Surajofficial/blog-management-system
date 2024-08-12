<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comments::class);
    }
}
