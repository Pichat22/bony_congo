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
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ville_depart_id');  // Référence à la ville de départ
            $table->unsignedBigInteger('ville_arrivee_id'); // Référence à la ville d'arrivée
            $table->unsignedBigInteger('compagnie_id');     // Référence à la compagnie
            $table->unsignedBigInteger('vol_id');           // Référence au vol
            $table->time('duree')->nullable();              // Durée estimée
            $table->date('date_depart');                    // Date de départ
            $table->timestamps();

            // Contraintes de clé étrangère
            $table->foreign('ville_depart_id')->references('id')->on('villes')->onDelete('cascade');
            $table->foreign('ville_arrivee_id')->references('id')->on('villes')->onDelete('cascade');
            $table->foreign('compagnie_id')->references('id')->on('compagnies')->onDelete('cascade');
            $table->foreign('vol_id')->references('id')->on('vols')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};
