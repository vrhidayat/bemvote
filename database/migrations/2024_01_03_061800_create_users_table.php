<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 9)->unique();
            $table->string('nama', 120);
            $table->string('id_prodi', 5);
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
            $table->string('ogPassword', 20);
            $table->string('password');
            $table->string('foto', 120)->nullable();
            $table->enum('role', ['admin', 'staff', 'user']);
            $table->rememberToken();
            $table->timestamps();
        });

        // Inserting sample data
        DB::table('users')->insert([
            ['nim' => '202104001', 'nama' => 'Rahmat Grace', 'id_prodi' => 'PR001', 'ogPassword' => 'akusukakamu', 'password' => bcrypt('akusukakamu'), 'role' => 'admin'],
            ['nim' => '202104002', 'nama' => 'Yanto Yasuo', 'id_prodi' => 'PR003', 'ogPassword' => 'bandarSkin', 'password' => bcrypt('bandarSkin'), 'role' => 'staff'],
            ['nim' => '202104003', 'nama' => 'Budi Budiman', 'id_prodi' => 'PR002', 'ogPassword' => 'akusayangmamah', 'password' => bcrypt('akusayangmamah'), 'role' => 'user'],
            ['nim' => '202104004', 'nama' => 'Rehan', 'id_prodi' => 'PR004', 'ogPassword' => 'nakYimYam', 'password' => bcrypt('nakYimYam'), 'role' => 'user']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
