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
      DB::unprepared('
            CREATE TRIGGER restock_produk
            AFTER UPDATE ON produks
            FOR EACH ROW
            BEGIN
                DECLARE reorder_date DATE;
                DECLARE total_required_stock INT;
                SET reorder_date = DATE_ADD(CURDATE(), INTERVAL NEW.lead_time_produk DAY);
                SET total_required_stock = NEW.rop_produk + NEW.safety_stock_produk;

                IF NEW.stok_produk <= total_required_stock THEN
                    UPDATE produks
                    SET stok_produk = stok_produk + (NEW.rop_produk * 2),
                        stok_realtime_produk = stok_realtime_produk + (NEW.rop_produk * 2)
                    WHERE id = NEW.id;
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS restock_produk');
    }
};
