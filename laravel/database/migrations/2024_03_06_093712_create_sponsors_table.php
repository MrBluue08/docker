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
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roomId');
            $table->string('sponsorId');
            $table->timestamps();
            $table->foreign('roomId')->references('id')->on('rooms');
            $table->foreign('sponsorId')->references('CIF')->on('sponsor_companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
