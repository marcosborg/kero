<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('status');
            $table->string('support_email')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('tax')->nullable();
            $table->string('invoice_name')->nullable();
            $table->string('payout_method');
            $table->longText('payout_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
