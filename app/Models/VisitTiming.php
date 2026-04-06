<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitTiming extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'events_and_holidays' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
