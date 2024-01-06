<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '000100010',
            'name' => 'Giorno Giovanna',
            'id_prodi' => 'PS004',
            'password' => Hash::make('goldenExp'),
        ]);
    }
}
