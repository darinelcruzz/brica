<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('r_providers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('rfc');
            $table->string('phone');
            $table->string('products');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('r_providers');
    }
}
