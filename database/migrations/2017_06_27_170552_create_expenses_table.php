<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */

    public function up()
    {
        $date = Date::now();
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description')->nullable();
            $table->float('amount')->nullable();
            $table->string('date')->nullable();
            $table->string('user')->nullable();

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
        Schema::dropIfExists('expenses');
    }
}
