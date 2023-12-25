<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
        CREATE TRIGGER generate_item_id
        BEFORE INSERT ON products
        FOR EACH ROW
        BEGIN
            DECLARE generated_id INT;
        

            SET generated_id = FLOOR(10000000 + RAND() * 90000000);
        
            WHILE EXISTS (SELECT 1 FROM products WHERE lot_number = generated_id) DO
                SET generated_id = FLOOR(10000000 + RAND() * 90000000);
            END WHILE;
        
            SET NEW.lot_number = generated_id;
        END;
    ');

    DB::statement("
    INSERT INTO categories (category) VALUES
    ('Drawings'),
    ('Paintings'),
    ('Photographic Images'),
    ('Sculptures'),
    ('Carvings');
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TRIGGER IF EXISTS generate_item_id');
        DB::statement('DELETE FROM categories WHERE category_id BETWEEN 1 AND 5;');
    }
};