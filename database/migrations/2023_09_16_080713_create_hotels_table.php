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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->char('hotel_name');
            $table->char('description', 255);
            $table->integer('location');
            $table->integer('rating');
            $table->integer('price_range');
            $table->char('amenities', 255);
            $table->date('check_in_time');
            $table->date('check_out_time');
            $table->boolean('is_wifi_available');
            $table->char('contact_information', 255);
            $table->char('reviews', 255);
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
