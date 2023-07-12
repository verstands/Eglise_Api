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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('postnom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('telephone');
            $table->string('adresse');
            $table->string('datenaissance');
            $table->string('etatcivil');
            $table->string('profession');
            $table->string('activite');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre');
    }
};
