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
        Schema::create('sponsor_companies', function (Blueprint $table) {
            $table->id();
            $table->string('CIF')->unique();
            $table->smallInteger('mainPage')->default(0);
            $table->string('sponsorName');
            $table->string('sponsorAdress');
            $table->string('sponsorLogo');
            $table->smallInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsor_companies');
    }
};
