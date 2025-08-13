<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionRulesTable extends Migration
{
    public function up()
    {
        Schema::create('commission_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('rate_percent', 5, 2);
            $table->date('valid_from');
            $table->date('valid_to')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
