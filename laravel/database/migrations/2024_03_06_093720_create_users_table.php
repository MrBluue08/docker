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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userMail', 255)->unique();
            $table->string('userName');
            $table->string('userSurname');
            $table->string('userAdress')->nullable();
            $table->date('userBirthDay')->nullable();
            $table->string('userGender')->nullable();
            $table->integer('teamId')->default(0);
            $table->smallInteger('member')->default(0);
            $table->string('userPassword',255)->nullable();
            $table->smallInteger('active')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
