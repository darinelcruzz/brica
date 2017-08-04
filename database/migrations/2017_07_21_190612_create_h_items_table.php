<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description');
            $table->string('caliber');
            $table->string('unity');
            $table->double('weight');
            $table->double('price');
            $table->string('family');

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
        Schema::dropIfExists('h_items');
    }
}
