<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouristspotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('touristspots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('spotslug');
            $table->integer('country_id');
            $table->integer('continent_id');
            $table->string('imageids');
            $table->longText('description');
            $table->longText('locationmape');
            $table->longText('tourguide');
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
        Schema::dropIfExists('touristspots');
    }
}
