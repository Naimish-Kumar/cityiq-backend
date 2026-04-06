<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'available_modes' => 'array',
        'pricing_data' => 'array',
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
