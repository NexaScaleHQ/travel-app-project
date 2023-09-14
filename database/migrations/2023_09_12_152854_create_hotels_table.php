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
        Schema::create('hotels', function (Blueprint $table) {
            $table->unsignedBiginteger('user_id');
            $table->string('restaurant_name')->required();
            $table->string('description')->required();
            $table->string('location')->required();
            $table->string('cuisine_type')->required();
            $table->integer('rating')->required();
            $table->integer('price_range')->required();
            $table->boolean('is_open');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
