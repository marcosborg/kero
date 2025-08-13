<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->integer('price_cents');
            $table->boolean('stock')->default(0)->nullable();
            $table->string('status')->nullable();
            $table->integer('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('seo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
