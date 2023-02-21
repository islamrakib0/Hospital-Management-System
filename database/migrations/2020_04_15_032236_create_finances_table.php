<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('amount');
            $table->unsignedBigInteger('payment_appointment')->nullable();
            $table->unsignedBigInteger('payment_test')->nullable();
            $table->unsignedBigInteger('payment_medicine')->nullable();
            $table->foreign('payment_appointment')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('payment_test')->references('id')->on('patient_tests')->onDelete('cascade');
            $table->foreign('payment_medicine')->references('id')->on('patient_medicines')->onDelete('cascade');
            $table->string('card_name');
            $table->string('card_number');
            $table->string('card_type');
            $table->string('card_month');
            $table->string('card_year');
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
        Schema::dropIfExists('finances');
    }
}
