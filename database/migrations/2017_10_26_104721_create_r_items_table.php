<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description');
            $table->string('caliber')->nullable();
            $table->string('unity')->nullable();
            $table->double('weight')->default(0);
            $table->double('stock')->default(0);

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
        Schema::dropIfExists('r_items');
    }
}
