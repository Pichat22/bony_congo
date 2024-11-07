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
        Schema::create('escales', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('trajet_id');  // Référence au trajet
            $table->unsignedBigInteger('ville_id');   // Référence à la ville
            $table->integer('ordre')->nullable();     // Position de l’escale dans le trajet
         
    
            // Contraintes de clés étrangères
            $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escales');
    }
};
