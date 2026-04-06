<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScamAlert extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'detection_tips' => 'array',
        'is_verified' => 'boolean',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
