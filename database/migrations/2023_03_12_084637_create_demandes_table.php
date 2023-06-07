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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('employeur_id')->constrained('employeurs');
            $table->text('description');
            $table->integer('nombre_poste');
            $table->decimal('salaire', 8, 2);
            $table->foreignId('type_contrat_id')->constrained('type_contrats');
            $table->date('date_publication');
            $table->date('date_expiration');
            $table->foreignId('user_create_id')->constrained('users');
            $table->foreignId('user_update_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
