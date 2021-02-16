<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('reservation_date');
            $table->bigInteger('time_id')->unsigned()->index();
            $table->bigInteger('course_id')->unsigned()->index();
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('email');
            $table->string('phone_number');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('time_id')->references('id')->on('times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
