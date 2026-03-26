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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('title');                 // House title
            $table->text('description')->nullable(); // House description
            $table->decimal('rent', 10, 2)->default(0); // Rent amount
            $table->unsignedTinyInteger('bedrooms')->default(1); // Bedrooms count
            $table->unsignedTinyInteger('bathrooms')->default(1); // Bathrooms count
            $table->string('area')->nullable();     // Area or locality
            $table->string('city')->nullable();     // City
            $table->string('image_url')->nullable(); // Featured image
            $table->boolean('is_furnished')->default(false); // Furnished or not
            $table->boolean('is_available')->default(true);  // Availability
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
