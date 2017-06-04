<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('client')->nullable();
            $table->string('description')->nullable();
            $table->string('team')->nullable();
            $table->float('quantity1')->nullable();
            $table->string('unit1')->nullable();
            $table->string('material1')->nullable();
            $table->float('price1')->nullable();
            $table->float('total')->nullable();

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
        Schema::dropIfExists('solicitudes');
    }
}
