<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = "kandidat";
    // protected $primaryKey = "nim";
    protected $fillable = ["id_user", "id_jadwal", "visi", "misi", "no_urut", "foto"];
    protected $casts = [
        'created_at' => 'datetime',
    ];
    // public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
