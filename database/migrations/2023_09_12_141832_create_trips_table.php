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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->integer('pickup_location');
            $table->foreignId('user_id')
                ->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->longText('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('dropoff_location');
            $table->integer('price');
            $table->integer('max_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
