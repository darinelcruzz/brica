<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeightToQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('quotations', function($table) {
            $table->double('weight')->default(0);
        });
    }

    public function down()
    {
        Schema::table('quotations', function($table) {
            $table->dropColumn('weight');
        });
    }
}
