<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('password_hash', 255);
            $table->string('password', 20);
            $table->string('foto', 120)->nullable();
            $table->enum('role', ['admin', 'staff', 'user']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
