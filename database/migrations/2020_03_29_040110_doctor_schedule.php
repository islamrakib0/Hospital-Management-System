<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DoctorSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor');
            $table->string('day');
            $table->unsignedBigInteger('timeslot');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('doctor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('timeslot')->references('id')->on('timeslot')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_schedule');
    }
}
