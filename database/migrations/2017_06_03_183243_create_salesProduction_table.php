<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesProductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesProduction', function (Blueprint $table) {
            $table->increments('id');

            $table->string('client')->nullable();
            $table->float('total')->nullable();
            $table->string('type')->nullable();
            $table->integer('cutBoar')->nullable();
            $table->integer('foldBoard')->nullable();
            $table->integer('cutProfile')->nullable();
            $table->integer('foldProfile')->nullable(); 
            $table->integer('weightBoar')->nullable(); 
            $table->integer('weightProfile')->nullable();

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
        Schema::dropIfExists('salesProduction');
    }
}
