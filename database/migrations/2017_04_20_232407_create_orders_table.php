<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('quotation')->nullable();
            $table->string('type')->nullable();
            $table->string('deliverDate')->nullable();
            $table->string('description')->nullable();
            $table->string('team')->nullable();
            $table->string('design')->nullable();
            $table->string('added')->nullable();
            $table->string('caliber')->nullable();
            $table->string('measureType')->nullable();
            $table->integer('pieces')->nullable();
            $table->float('height')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->string('status')->default("pendiente");
            $table->string('client')->nullable();
            
            $table->string('startTime')->nullable();
            $table->string('endTime')->nullable();



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
        Schema::dropIfExists('orders');
    }
}
