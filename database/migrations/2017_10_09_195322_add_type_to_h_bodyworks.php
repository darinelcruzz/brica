<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToHBodyworks extends Migration
{
    public function up()
    {
        Schema::table('h_bodyworks', function($table) {
            $table->string('type')->default('redila');
        });
    }

    public function down()
    {
        Schema::table('h_bodyworks', function($table) {
            $table->dropColumn('type');
        });
    }
}
