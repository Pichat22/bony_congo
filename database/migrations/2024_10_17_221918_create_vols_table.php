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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre_de_place');
            $table->string('matricule');
            $table->string('marque');
            $table->date('date_de_creation');
            $table->unsignedBigInteger('compagnie_id');
            $table->timestamps();
            $table->foreign('compagnie_id')->references('id')->on('compagnies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
