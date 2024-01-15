<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = ["title", "elect_date", "open_vote", "close_vote"];
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
