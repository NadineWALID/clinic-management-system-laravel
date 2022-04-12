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
            $table->string('user_id')->nullable();
            $table->integer('doctor_id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('date');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('time');
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
