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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('roomName');
            $table->string('roomDescription', 255);
            $table->integer('roomMaxTeams');
            $table->integer('roomMaxTime');
            $table->dateTime('roomDate');
            $table->integer('roomTotalTeams')->default(0);
            $table->string('roomStructueImg', 255);
            $table->string('roomPromotionImg', 255);
            $table->integer('roomPromotionCost');
            $table->integer('roomInsuranceCost');
            $table->integer('roomInscriptionPrice');
            $table->integer('roomInscriptionPriceMembers');
            $table->smallInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
