<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('packagename');
            $table->text('packageslug');
            $table->string('packageimages');
            $table->integer('continentid');
            $table->integer('countryid');
            $table->integer('tourist_spotsid');
            $table->longText('program');
            $table->longText('description');
            $table->longText('map');
            $table->double('packageprice');
            $table->text('lat');
            $table->text('long');
            $table->integer('package_cat');
            $table->integer('ishighlighted');
            $table->timestamps();
        });

        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pro_title');
            $table->text('pro_description');
            $table->string('pro_day');
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
        Schema::dropIfExists('packages');
    }
}
