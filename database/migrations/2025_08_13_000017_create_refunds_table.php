<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount_cents');
            $table->string('reason')->nullable();
            $table->string('status')->nullable();
            $table->longText('payload')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
