<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBodyworksSpecificsToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('h_orders', function($table) {
            $table->string('serial_number')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('chasis')->nullable();
            $table->string('floor')->nullable();
            $table->string('clothing_spec')->nullable();
            $table->string('supervisor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('h_orders', function($table) {
            $table->dropColumn('serial_number');
            $table->dropColumn('brand');
            $table->dropColumn('model');
            $table->dropColumn('chasis');
            $table->dropColumn('floor');
            $table->dropColumn('clothing_spec');
            $table->dropColumn('supervisor');
        });
    }
}
