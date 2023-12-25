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
            $table->string('product_name');
            $table->string('artist');
            $table->unsignedBigInteger('category_id');
            $table->date('year_produced');
            $table->string('subject_classification');
            $table->text('description');
            $table->unsignedBigInteger('catalog_id');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->decimal('estimated_price', 10, 2);
            $table->string('material_used')->nullable();
            $table->boolean('is_framed')->default(0);
            $table->decimal('height', 8, 2)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->enum('type', ['Black and White', 'Color'])->nullable();
            $table->boolean('is_archived')->default(0);
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('catalog_id')
            ->references('catalog_id')
            ->on('catalogs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
  
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