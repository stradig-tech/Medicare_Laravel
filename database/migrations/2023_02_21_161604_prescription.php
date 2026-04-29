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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string("doctorid");
            $table->string("doctorname");
            $table->string("patientid");
            $table->string("patientname");
            $table->string("patientpicture");
            $table->string("appointmentid");
            $table->string("medicine");
            $table->string("test");
            $table->string("suggestion");

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
