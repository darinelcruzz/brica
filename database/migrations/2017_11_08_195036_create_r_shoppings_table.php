<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_shoppings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('provider');
            $table->timestamp('date');
            $table->string('product');
            $table->string('status')->default('pendiente');
            $table->double('unit_price')->default(0);
            $table->double('kg')->default(0);

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
        Schema::dropIfExists('r_shoppings');
    }
}
