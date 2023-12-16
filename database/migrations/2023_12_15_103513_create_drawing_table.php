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
        Schema::create('drawings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id'); // Foreign key to the items table
            $table->string('drawing_medium'); // e.g., pencil, ink, charcoal
            $table->boolean('framed')->default(false);
            $table->integer('dimensions_height');
            $table->integer('dimensions_length');
            $table->string('image_path')->nullable(); // Attribute for uploading images
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drawings');
    }
};
