<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qty');
            $table->decimal('price_cents', 15, 2);
            $table->decimal('subtotal_cents', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
