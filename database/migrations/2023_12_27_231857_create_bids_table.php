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
        Schema::create('bids', function (Blueprint $table) {
            $table->id('bid_id');
            $table->unsignedBigInteger('lot_number');
            $table->decimal('bid_amount', 10, 2);
            $table->unsignedBigInteger('bid_user')->nullable();
            $table->timestamps();
            

            $table->foreign('lot_number')->references('lot_number')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
