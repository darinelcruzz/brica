<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveToHPersonnel extends Migration
{
    public function up()
    {
        Schema::table('h_personnels', function($table) {
            $table->integer('active')->default(1);
        });
    }

    public function down()
    {
        Schema::table('h_personnels', function($table) {
            $table->dropColumn('active');
        });
    }
}
