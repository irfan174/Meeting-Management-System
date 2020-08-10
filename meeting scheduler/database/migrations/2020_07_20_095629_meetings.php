<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meetings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meeting_name');
            $table->string('client_id');
            $table->string('meeting_vanue');
            $table->string('host_id');
            $table->string('attendences');
            $table->string('date');
            $table->string('start_time')->nullable();
            $table->string('end_time');
            $table->string('meeting_details');
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
        //
    }
}
