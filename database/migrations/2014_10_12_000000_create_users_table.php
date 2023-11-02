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
            $table->text('nom_user');
            $table->text('prenom_user');
            $table->text('email');
            $table->text('phone_user');
            $table->text('password');
            $table->text('key');
            $table->text('laste_see');
            $table->text('profil');
            $table->text('adress')->nullable();
            $table->text('site')->nullable();
            $table->integer('is_active')->default(0)->nullable();
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
