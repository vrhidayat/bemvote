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
            $table->string('prodi_name', 120);
            $table->timestamps();
        });

        // Inserting sample data
        DB::table('prodi')->insert([
            ['id_prodi' => 'PR001', 'prodi_name' => 'Information Technology', 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 'PR002', 'prodi_name' => 'Computer Science', 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 'PR003', 'prodi_name' => 'Law', 'created_at' => now(), 'updated_at' => now()],
            ['id_prodi' => 'PR004', 'prodi_name' => 'Agriculture', 'created_at' => now(), 'updated_at' => now()]
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
