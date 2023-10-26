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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    
        Schema::create('game_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('games_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
    
            $table->foreign('games_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }
};