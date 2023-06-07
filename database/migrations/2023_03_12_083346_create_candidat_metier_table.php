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
        Schema::create('candidat_metier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->nullable()->constrained('candidats');
            $table->foreignId('metier_id')->nullable()->constrained('metiers');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidat_metier');
    }
};
