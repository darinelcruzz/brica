<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModelToHReceiptsTable extends Migration
{
    public function up()
    {
        Schema::table('h_receipts', function($table) {
            $table->string('model')->nullable();
        });
    }

    public function down()
    {
        Schema::table('h_receipts', function($table) {
            $table->dropColumn('model');
        });
    }
}
