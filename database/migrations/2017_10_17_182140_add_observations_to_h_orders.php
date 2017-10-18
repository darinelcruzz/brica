<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObservationsToHOrders extends Migration
{
    public function up()
    {
        Schema::table('h_orders', function($table) {
            $table->string('observations')->nullable();
        });
    }

    public function down()
    {
        Schema::table('h_orders', function($table) {
            $table->dropColumn('observations');
        });
    }
}
