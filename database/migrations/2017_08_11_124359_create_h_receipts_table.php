<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_receipts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client');
            $table->integer('bodywork');
            $table->double('retainer')->default(0);
            $table->string('color');
            $table->string('deliver');
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
        Schema::dropIfExists('h_receipts');
    }
}
