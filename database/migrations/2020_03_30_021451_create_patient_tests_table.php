<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient');
            $table->unsignedBigInteger('test');
            $table->string('collection_date');
            $table->string('delivery_date');
            $table->string('cost');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('patient')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('test')->references('id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_tests');
    }
}
