<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactNumberToHClients extends Migration
{
    public function up()
    {
        Schema::table('h_clients', function($table) {
            $table->string('contact_number')->nullable();
        });
    }

    public function down()
    {
        Schema::table('h_clients', function($table) {
            $table->dropColumn('contact_number');
        });
    }
}
