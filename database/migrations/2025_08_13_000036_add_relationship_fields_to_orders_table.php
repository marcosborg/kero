<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10685992')->references('id')->on('users');
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->foreign('billing_address_id', 'billing_address_fk_10686000')->references('id')->on('addresses');
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->foreign('shipping_address_id', 'shipping_address_fk_10686001')->references('id')->on('addresses');
        });
    }
}
