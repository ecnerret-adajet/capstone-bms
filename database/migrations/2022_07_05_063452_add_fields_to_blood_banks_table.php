<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBloodBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blood_banks', function (Blueprint $table) {
            $table->integer('event_id')->unsigne()->nullable();
            $table->integer('donor_id')->unsigne()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_banks', function (Blueprint $table) {
            $table->dropColumn('event_id');
            $table->dropColumn('donor_id');
        });
    }
}
