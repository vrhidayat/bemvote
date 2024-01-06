<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";
    // protected $primaryKey = "nim";
    protected $fillable = ["nim", "nama", "id_prodi", "password_hash", "password", "foto", "role"];
    protected $hidden = ["password", "password_hash"];
    protected $casts = [
        'created_at' => 'datetime',
        'password_hash' => 'hashed',
    ];
    // public $timestamps = false;

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}
