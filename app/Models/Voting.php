<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $table = "voting";
    protected $fillable = ["id_user", "id_kandidat", "id_jadwal", "waktu_voting"];
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'id_kandidat');
    }
}
