<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandToRItems extends Migration
{
    public function up()
    {
        Schema::table('r_items', function($table) {
            $table->string('brand')->nullable();
        });
    }

    public function down()
    {
        Schema::table('r_items', function($table) {
            $table->dropColumn('brand');
        });
    }
}
