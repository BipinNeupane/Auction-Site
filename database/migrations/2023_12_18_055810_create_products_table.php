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
        Schema::create('products', function (Blueprint $table) {
            $table->id('lot_number');
            $table->string('artist');
            $table->unsignedBigInteger('category_id');
            $table->integer('year_produced');
            $table->string('subject_classification');
            $table->text('description');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('estimated_price', 10, 2);
            $table->string('material_used');
            $table->boolean('is_framed')->default(0);
            $table->decimal('height', 8, 2);
            $table->decimal('length', 8, 2);
            $table->decimal('width', 8, 2);
            $table->enum('type', ['Black and White', 'Color']);
            $table->boolean('is_archived')->default(0);
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
