<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::disableForeignKeyConstraints();
        Schema::table('products', function (Blueprint $table) {
            //$table->bigInteger("seller_id")->unsigned()->nullable(true);
            $table->foreignId('seller_id')->nullable(true)->references('id')->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_seller_id_foreign');
            $table->dropColumn('seller_id');
        });
    }
};
