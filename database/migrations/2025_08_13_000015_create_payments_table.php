<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provider')->nullable();
            $table->string('provider_ref')->nullable();
            $table->integer('amount_cents');
            $table->string('status')->nullable();
            $table->longText('payload')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
