<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'type',
        'title',
        'message',
        'previous_score',
        'current_score',
        'is_read',
        'meta',
    ];

    protected $casts = [
        'previous_score' => 'decimal:2',
        'current_score' => 'decimal:2',
        'is_read' => 'boolean',
        'meta' => 'array',
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
