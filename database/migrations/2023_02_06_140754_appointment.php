<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string("doctorid");
            $table->string("doctorname");
            $table->string("patientid");
            $table->string("patientname");
            $table->text("patientaddress");
            $table->string("patientphone");
            $table->string("patientgender");
            $table->date("appointmentdate");
            $table->string("specialization");
            $table->string("patientpicture")->nullable();
            $table->unsignedInteger('appointmentstatus')->default(0);
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
};
