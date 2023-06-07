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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->date('fin_abonnement')->nullable();
            $table->text('presentation');
            $table->integer("nombre_demandes_restantes")->unsigned()->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('abonnement_id')->nullable()->constrained('abonnements');
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
        Schema::dropIfExists('candidats');
    }
};
