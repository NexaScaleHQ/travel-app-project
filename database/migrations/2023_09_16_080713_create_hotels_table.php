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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('hotel_name');
            $table->string('description');
            $table->integer('location');
            $table->integer('rating');
            $table->integer('price_range');
            $table->string('amenities');
            $table->dateTime('check_in_time');
            $table->dateTime('check_out_time');
            $table->boolean('is_wifi_available');
            $table->string('contact_information');
            $table->string('reviews');
            $table->timestamps();
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
