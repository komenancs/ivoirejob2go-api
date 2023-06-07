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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->constrained('candidats');
            $table->foreignId('demande_id')->constrained('demandes');
            $table->integer('nombre_etoiles')->nullable();
            $table->dateTime('demande_date');
            $table->dateTime('derniere_etoile_date')->nullable();
            $table->dateTime('approbation_date')->nullable();
            $table->boolean("status_paiement")->default(False);
            $table->foreignId('user_create_id')->nullable()->constrained('users');
            $table->foreignId('user_update_id')->nullable()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
