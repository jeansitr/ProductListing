<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::raw('
            CREATE TRIGGER `tr_au_products_updated_at`
            AFTER UPDATE
            ON products
            FOR EACH ROW
            BEGIN
                UPDATE product SET updated_at = CURRENT_TIMESTAMP WHERE id = old.id;
            END
            '
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::raw('DROP TRIGGER `tr_au_products_updated_at`');
    }
};
