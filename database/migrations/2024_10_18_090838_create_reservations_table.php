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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date de réservation
            $table->string('statut')->default('en attente'); // Statut par défaut
            $table->string('classe'); // Classe (économique, business, etc.)
            $table->unsignedBigInteger('user_id'); // Utilisateur qui réserve
            $table->unsignedBigInteger('trajet_id'); // Trajet réservé
            $table->integer('nombre_de_place'); // Nombre de places réservées
            $table->timestamps();

            // Clés étrangères
            $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
