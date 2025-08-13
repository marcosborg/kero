<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_snapshot');
            $table->string('sku_snapshot')->nullable();
            $table->integer('qty');
            $table->integer('price_cents');
            $table->integer('subtotal_cents');
            $table->float('tax_rate', 5, 2)->nullable();
            $table->float('commission_rate', 5, 2)->nullable();
            $table->integer('commission_cents')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
