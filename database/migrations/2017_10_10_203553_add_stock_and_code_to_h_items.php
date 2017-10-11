<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockAndCodeToHItems extends Migration
{
    public function up()
    {
        Schema::table('h_items', function($table) {
            $table->string('code')->nullable();
        });
    }

    public function down()
    {
        Schema::table('h_items', function($table) {
            $table->dropColumn('code');
        });
    }
}
