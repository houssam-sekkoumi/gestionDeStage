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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nom");
            $table->string("prenom");
            $table->string("email")->unique();
            $table->string("password");
            $table->string("matricule");
            $table->string("filière");
            $table->string("classe");
            $table->string("groupe");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
