<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = "prodi";
    protected $primaryKey = "id_prodi";
    protected $fillable = ["id_prodi", "prodi_name"];
    // public $timestamps = false;
    protected $keyType = 'String';
}
