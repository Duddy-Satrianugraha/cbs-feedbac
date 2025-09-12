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
        Schema::create('ofeedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('ujian_name');
            $table->string('jenis_feedback');
            $table->string('nama');
            $table->string('npm');
            $table->foreignId('detail_feedback_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofeedbacks');
    }
};
