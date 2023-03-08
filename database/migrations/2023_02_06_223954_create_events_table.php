<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('eventID');
            $table->string('eventName');
            $table->unsignedBigInteger('eventCategory');
            $table->foreign('eventCategory')->references('eventCategoryID')->on('event_categories');//->onDelete('cascade');
            $table->date('startDate');
            $table->date('endDate');
            $table->time('startTime');
            $table->time('endTime');
            $table->string('location');
            $table->text('eventDescription');
            $table->integer('ticketPrice')->default('0');
            $table->string('posterImg');
            $table->timestamps();
            $table->boolean('isDeleted')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
