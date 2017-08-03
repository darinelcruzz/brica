<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHBodyworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_bodyworks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description');
            $table->string('family');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->double('price');
            $table->mediumText('welding');
            $table->mediumText('anchoring');
            $table->mediumText('clothing');
            $table->mediumText('painting');
            $table->mediumText('mounting');

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
        Schema::dropIfExists('h_bodyworks');
    }
}
