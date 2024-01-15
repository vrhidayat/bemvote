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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('elect_date');
            $table->dateTime('open_vote');
            $table->dateTime('close_vote');
            $table->enum('status', ['future', 'ongoing', 'closed'])->default('future');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
        DB::unprepared('DROP TRIGGER IF EXISTS update_jadwal_status');
    }
};
