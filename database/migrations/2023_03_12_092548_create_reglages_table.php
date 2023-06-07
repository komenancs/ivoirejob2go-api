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
        Schema::create('reglages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('user_create_id')->nullable();
            $table->foreign('user_create_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_update_id')->nullable();
            $table->foreign('user_update_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reglages');
    }
};
