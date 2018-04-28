<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToRItemsTable extends Migration
{
    public function up()
    {
        Schema::table('r_items', function($table) {
            $table->double('price')->default(0);
        });
    }

    public function down()
    {
        Schema::table('r_items', function($table) {
            $table->dropColumn('price');
        });
    }
}
