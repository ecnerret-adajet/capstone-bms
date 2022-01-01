<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('blood_type_id')->unsigned();
            $table->integer('urgency_type_id')->unsigned();
            $table->integer('rh_group_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->string('patient_name');
            $table->string('diagnosies');
            $table->integer('bag_quantity')->unsigned();
            $table->integer('purpose_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
