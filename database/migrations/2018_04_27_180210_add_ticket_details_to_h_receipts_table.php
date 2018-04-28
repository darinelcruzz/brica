<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTicketDetailsToHReceiptsTable extends Migration
{
    public function up()
    {
        Schema::table('h_receipts', function($table) {
            $table->string('printer')->nullable();
            $table->date('print_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('h_receipts', function($table) {
            $table->dropColumn('printer');
            $table->dropColumn('print_date');
        });
    }
}
