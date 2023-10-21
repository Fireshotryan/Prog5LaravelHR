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
        Schema::create('roles_permissions', function (Blueprint $table) {
             $table->unsignedInteger('role_id');
             $table->unsignedInteger('permission_id');
    
             //FOREIGN KEY
             $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
             $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
    
             //PRIMARY KEYS
             $table->primary(['role_id','permission_id']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_permissions');
    }
};
