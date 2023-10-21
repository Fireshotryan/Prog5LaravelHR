<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');
    
         //FOREIGN KEY
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    
         //PRIMARY KEYS
           $table->primary(['user_id','role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_roles');
    }
};
