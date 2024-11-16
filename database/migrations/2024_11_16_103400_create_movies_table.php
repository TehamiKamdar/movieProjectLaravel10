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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image')->nullable();
            $table->string('trailer')->nullable();
            $table->string('genre');
            $table->string('director');
            $table->string('language');
            $table->string('duration');
            $table->string('release_date');
            $table->string('rating')->nullable();
            $table->unsignedBigInteger('theatre_id');
            $table->foreign('theatre_id')->references('id')->on('theatres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
