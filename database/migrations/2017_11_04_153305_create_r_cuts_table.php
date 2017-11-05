<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRCutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_cuts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id');
            $table->double('quantity');
            $table->double('length');
            $table->double('width');
            $table->string('caliber');
            $table->string('status')->default('pendiente');
            $table->integer('team_id');

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
        Schema::dropIfExists('r_cuts');
    }
}
