<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('continent_id');
            $table->string('capital');
            $table->string('name');
            $table->text('slug');
            $table->text('description');
            $table->text('tourguide');
            $table->longText('benifit');
            $table->text('locationmape');
            $table->text('lat');
            $table->text('long');

            $table->string('imageids');
            $table->string('hitcounts');
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
        Schema::dropIfExists('countries');
    }
}
