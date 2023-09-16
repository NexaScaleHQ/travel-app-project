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
        Schema::create('toilets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->integer('location');
            $table->string('description');
            $table->string('accessibility');
            $table->integer('cleanliness_rating');
            $table->boolean('is_free');
            $table->dateTime('opening_hours');
            $table->string('amenities');
            $table->text('reviews')->nullable();
            $table->boolean('is_available');
            $table->timestamps();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toilets');
    }
};
