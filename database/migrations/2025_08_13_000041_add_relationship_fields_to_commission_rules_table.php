<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommissionRulesTable extends Migration
{
    public function up()
    {
        Schema::table('commission_rules', function (Blueprint $table) {
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id', 'vendor_fk_10686600')->references('id')->on('vendors');
        });
    }
}
