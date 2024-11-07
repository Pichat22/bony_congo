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
        Schema::create('villes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');           // Nom de la ville
            $table->string('pays');          // Pays
            $table->decimal('latitude', 10, 7)->nullable();  // Latitude
            $table->decimal('longitude', 10, 7)->nullable(); // Longitude
            $table->integer('population')->nullable();       // Population
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villes');
    }
};
