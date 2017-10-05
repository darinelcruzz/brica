<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHStockSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_stock_sales', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client');
            $table->string('other')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('products', 800)->nullable();
            $table->double('total')->default(0);
            $table->string('observations')->nullable();

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
        Schema::dropIfExists('h_stock_sales');
    }
}
