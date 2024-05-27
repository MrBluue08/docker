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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('teamName');
            $table->smallInteger('leagueParticipant');
            $table->integer('roomsDone')->default(0);
            $table->integer('points')->default(0);
            $table->string('teamLeadMail');
            $table->smallInteger('active')->default(1);
            $table->timestamps();
            $table->foreign('teamLeadMail')->references('userMail')->on('users')->onUpdate('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
