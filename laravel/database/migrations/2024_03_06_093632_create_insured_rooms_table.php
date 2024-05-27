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
        Schema::create('insured_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roomId')->nullable(false);
            $table->string('insuranceCompanieCIF')->nullable(false);
            $table->timestamps();

            $table->foreign('roomId')->references('id')->on('rooms');
            $table->foreign('insuranceCompanieCIF')->references('CIF')->on('insurance_companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insured_rooms');
    }
};
