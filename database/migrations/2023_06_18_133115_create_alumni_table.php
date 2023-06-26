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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departement_id')->constrained()->restrictOnDelete();
            $table->foreignId('study_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('email')->unique();
            $table->string('ipk');
            $table->string('title_of_final_task');
            $table->string('photo');
            $table->foreignId('job_id')->constrained()->restrictOnDelete();
            $table->string('company')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
