<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('addressable_type');
            $table->integer('addressable');
            $table->string('name')->nullable();
            $table->string('line_1');
            $table->string('line_2')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
