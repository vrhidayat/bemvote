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
        Schema::create('prodi', function (Blueprint $table) {
            $table->string('id_prodi', 5)->primary();
            $table->string('nama_prodi', 120);
            $table->timestamps();
        });

        // Inserting sample data
        DB::table('prodi')->insert([
            ['id_prodi' => 'ADM', 'nama_prodi' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 'PR001', 'nama_prodi' => 'Information Technology', 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 'PR002', 'nama_prodi' => 'Computer Science', 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 'PR003', 'nama_prodi' => 'Law', 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 'PR004', 'nama_prodi' => 'Agriculture', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
