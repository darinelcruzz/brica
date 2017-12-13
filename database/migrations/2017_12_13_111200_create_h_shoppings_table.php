<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_shoppings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('provider');
            $table->timestamp('date');
            $table->string('product');
            $table->string('status')->default('pendiente');
            $table->double('unit_price')->default(0);
            $table->double('quantity')->default(0);
            $table->string('unity')->default('kg');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_shoppings');
    }
}
