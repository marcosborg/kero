<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('carrier')->nullable();
            $table->string('tracking_code')->nullable();
            $table->string('status')->nullable();
            $table->integer('cost_cents')->nullable();
            $table->string('label_url')->nullable();
            $table->longText('payload')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
