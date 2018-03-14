<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHGondolasTable extends Migration
{
    public function up()
    {
        Schema::create('h_gondolas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->double('price');
            $table->string('code');
            $table->integer('client_id')->nullable();
            $table->string('status')->default('disponible');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('h_gondolas');
    }
}
