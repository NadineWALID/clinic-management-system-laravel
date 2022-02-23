<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('medicine');
            $table->string('radiology_image');
            $table->string('gender');
            $table->string('diagnosis');
            $table->string('blood_type');
            $table->string('lab_results');
            $table->string('allergies');
            $table->string('chronic_diseases');
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
        Schema::dropIfExists('records');
    }
}
