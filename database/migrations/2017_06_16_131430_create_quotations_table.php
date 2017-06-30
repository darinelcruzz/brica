<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('client')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->float('amount')->nullable();
            $table->string('date_payment')->nullable();
            
            $table->string('startTime')->nullable();
            $table->string('endTime')->nullable();

            $table->timestamps();
        });
    }


    /**
    * Run the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
