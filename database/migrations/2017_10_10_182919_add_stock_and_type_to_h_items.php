<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockAndTypeToHItems extends Migration
{
    public function up()
    {
        Schema::table('h_items', function($table) {
            $table->string('type')->default('carroceria');
            $table->double('stock')->default(0);
        });
    }

    public function down()
    {
        Schema::table('h_items', function($table) {
            $table->dropColumn('type');
            $table->dropColumn('stock');
        });
    }
}
