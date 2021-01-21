<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Carbon;

class Tweet extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('D M Y');
    }
}
