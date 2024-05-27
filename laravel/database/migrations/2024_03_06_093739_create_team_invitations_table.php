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
        Schema::create('team_invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teamID');
            $table->string('invitedUserMail');
            $table->smallInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('teamID')->references('id')->on('teams');
            $table->foreign('invitedUserMail')->references('userMail')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_invitations');
    }
};
