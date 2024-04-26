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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
            $table->string('doctor_id');
            $table->foreign('doctor_id')->references('doctor_id')->on('doctors')->onDelete('cascade');
            $table->string('lab_rotary_id')->nullable();
            $table->foreign('lab_rotary_id')->nullable()->references('lab_rotary_id')->on('lab_rotaries')->onDelete('cascade');
            $table->string('report');
            $table->enum('status', ['pending', 'sent', 'done', null])->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
