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
        Schema::create('competence_candidat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competence_id')->nullable()->constrained('competences');
            $table->foreignId('candidat_id')->nullable()->constrained('candidats');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competence_candidat');
    }
};
