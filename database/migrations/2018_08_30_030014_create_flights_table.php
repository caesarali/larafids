<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('airline_id')->unsigned();
            $table->string('aircraft_id');
            $table->string('flight_number');
            $table->integer('origin_id')->unsigned();
            $table->integer('destination_id')->unsigned();
            $table->time('etd');
            $table->time('eta');
            $table->integer('terminal')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('origin_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('destination_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
