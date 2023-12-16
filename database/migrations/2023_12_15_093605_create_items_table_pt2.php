<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('artist'); // Change from unsignedBigInteger to string
            $table->string('lot_number')->unique();
            $table->unsignedBigInteger('category_id');
            $table->integer('year_produced');
            $table->string('subject_classification');
            $table->text('description');
            $table->date('auction_date')->nullable();
            $table->decimal('estimated_price', 10, 2);

            // Foreign key relationship
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_table_pt2');
    }
};
