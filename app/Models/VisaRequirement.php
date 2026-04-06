<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaRequirement extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'document_checklist' => 'array',
        'rejection_reasons' => 'array',
        'tips' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
