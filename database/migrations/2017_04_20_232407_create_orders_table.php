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

            $table->string('team')->nullable();
            $table->string('client')->nullable();
            $table->string('description')->nullable();
            $table->string('design')->nullable();
            $table->string('caliber')->nullable();
            $table->string('measure')->nullable();
            $table->integer('pieces')->nullable();
            $table->float('height')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->string('status')->default("pendiente");
            $table->string('type')->nullable();
            $table->string('estimated')->nullable();
            $table->float('advance')->default(0.0);

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
