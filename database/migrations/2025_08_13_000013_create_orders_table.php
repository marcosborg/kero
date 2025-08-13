<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('status')->nullable();
            $table->string('currency');
            $table->integer('subtotal_cents')->nullable();
            $table->integer('discount_cents')->nullable();
            $table->integer('shipping_cents')->nullable();
            $table->integer('tax_cents')->nullable();
            $table->integer('total_cents');
            $table->string('notes')->nullable();
            $table->string('payment_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
