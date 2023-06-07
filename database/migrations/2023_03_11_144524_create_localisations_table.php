<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('localisations', function (Blueprint $table) {
            $table->id();
            $table->string('pays');
            $table->string('ville');
            $table->string('quatier')->nullable();
            $table->string('rue')->nullable();
            $table->foreignId('user_create_id')->nullable()->constrained('users');
            $table->foreignId('user_update_id')->nullable()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('localisations');
    }
};
