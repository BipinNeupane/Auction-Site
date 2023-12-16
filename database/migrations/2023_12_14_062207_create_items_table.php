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
       
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist');
            $table->string('lot_number')->unique();
            $table->unsignedBigInteger('category_id');
            $table->integer('year_produced');
            $table->string('subject_classification');
            $table->text('description');
            $table->date('auction_date')->nullable();
            $table->decimal('estimated_price', 10, 2);

            // Foreign key relationships
            
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
        });
    
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
