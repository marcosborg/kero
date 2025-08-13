<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutsTable extends Migration
{
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('period_start');
            $table->date('period_end');
            $table->integer('gross_cents');
            $table->integer('commissions_cents');
            $table->integer('refunds_cents');
            $table->integer('net_cents');
            $table->string('status')->nullable();
            $table->longText('payload')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
