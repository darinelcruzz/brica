<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFolioToQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('quotations', function($table) {
            $table->integer('folio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('quotations', function($table) {
            $table->dropColumn('folio');
        });
    }
}
