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
        Schema::create('sponsor_user', function (Blueprint $table) {
            $table->unsignedBigInteger('sponsor_id');

            $table->foreign('sponsor_id')
            ->references('id')
            ->on('sponsors')
            ->onDelete('cascade'); 
            
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->date('start_date')->format('d/m/Y');
            $table->date('end_date')->format('d/m/Y');
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsor_user');
    }
};
