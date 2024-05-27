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
        Schema::create('team_signups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roomId');
            $table->unsignedBigInteger('teamId');
            $table->smallInteger('status')->default(0);
            $table->integer('dorsal')->nullable();
            $table->time('tiempo')->nullable();
            $table->timestamps();
    
            $table->foreign('roomId')->references('id')->on('rooms');
            $table->foreign('teamId')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_signups');
    }
};
