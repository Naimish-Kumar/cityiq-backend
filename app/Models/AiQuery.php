<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiQuery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'query',
        'response',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
