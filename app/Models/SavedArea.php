<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
    ];

    protected $appends = [
        'latest_alert',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function getLatestAlertAttribute()
    {
        return AreaAlert::query()
            ->where('user_id', $this->user_id)
            ->where('area_id', $this->area_id)
            ->latest()
            ->first();
    }
}
