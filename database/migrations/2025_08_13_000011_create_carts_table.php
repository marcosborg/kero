<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->unique();
            $table->string('currency');
            $table->longText('totals')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
