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
        Schema::create('employeurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('localisation_id')->constrained('localisations');
            $table->text('description');
            $table->string('logo')->nullable();
            $table->string('email');
            $table->unsignedBigInteger('abonnement_id')->nullable();
            $table->foreign('abonnement_id')->references('id')->on('abonnements');
            $table->integer("nombre_demandes_restantes")->unsigned()->nullable();
            $table->string('contact_1');
            $table->string('contact_2')->nullable();
            $table->string('site_web')->nullable();
            $table->string('lien_twitter')->nullable();
            $table->string('lien_facebook')->nullable();
            $table->string('lien_linkedin')->nullable();
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('employeurs');
    }
};
