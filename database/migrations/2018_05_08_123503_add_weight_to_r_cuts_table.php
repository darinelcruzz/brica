<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeightToRCutsTable extends Migration
{
    public function up()
    {
        Schema::table('r_cuts', function($table) {
            $table->double('weight')->default(0);
        });
    }

    public function down()
    {
        Schema::table('r_cuts', function($table) {
            $table->dropColumn('weight');
        });
    }
}
