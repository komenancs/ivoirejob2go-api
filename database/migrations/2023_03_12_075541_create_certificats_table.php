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
        Schema::create('certificats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_certificat_id');
            $table->foreign('type_certificat_id')->references('id')->on('type_certificats')->onDelete('cascade');
            $table->unsignedBigInteger('candidat_id');
            $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade');
            $table->string('nom');
            $table->string('numero_certificat')->nullable();
            $table->date('date_obtention')->nullable();
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
        Schema::dropIfExists('certificats');
    }
};
