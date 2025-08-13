<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_10686008')->references('id')->on('orders');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id', 'vendor_fk_10686009')->references('id')->on('vendors');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_10686010')->references('id')->on('products');
        });
    }
}
