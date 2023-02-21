<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->unsignedBigInteger('patient');
            $table->unsignedBigInteger('doctor');
            $table->string('date');
            $table->unsignedBigInteger('timeslot');
            $table->string('fees');
            $table->string('number')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('patient')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
}
