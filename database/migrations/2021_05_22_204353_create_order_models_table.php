<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_models', function (Blueprint $table) {
            $table->id();
            $table->longText('order');
            $table->string('price');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('delType');
            $table->string('address');
            $table->string('payment');
            $table->string('status');
            $table->dateTime('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_models');
    }
}
