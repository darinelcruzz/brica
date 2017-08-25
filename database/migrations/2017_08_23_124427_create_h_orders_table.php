<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('bodywork')->nullable();
            $table->integer('receipt')->nullable();
            $table->string('status')->default('pendiente');
            $table->string('welding')->nullable();
            $table->string('anchoring')->nullable();
            $table->string('clothing')->nullable();
            $table->string('painting')->nullable();
            $table->string('mounting')->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('startDate')->nullable();
            $table->timestamp('endDate')->nullable();

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
        Schema::dropIfExists('h_orders');
    }
}
