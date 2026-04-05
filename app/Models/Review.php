<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'content',
        'rating',
        'tags',
        'likes',
        'is_verified_local',
    ];

    protected $casts = [
        'tags' => 'array',
        'rating' => 'integer',
        'likes' => 'integer',
        'is_verified_local' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
