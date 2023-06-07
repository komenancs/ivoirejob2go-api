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
        Schema::create('employeur_secteur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employeur_id')->constrained('employeurs');
            $table->foreignId('secteur_id')->constrained('secteurs');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employeur_secteur');
    }
};
