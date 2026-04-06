<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryAlert extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'recommended_actions' => 'array',
        'expires_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
