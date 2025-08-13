<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShipmentsTable extends Migration
{
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_10686580')->references('id')->on('orders');
        });
    }
}
