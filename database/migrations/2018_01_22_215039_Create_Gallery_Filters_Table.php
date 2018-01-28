<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


        public function up()
    {
        Schema::create('gallery_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();
            $table->foreign('gallery_id')->references('id')->on('galleries');
            $table->integer('filter_id')->unsigned();
            $table->foreign('filter_id')->references('id')->on('filters');
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
        Schema::dropIfExists('gallery_filters');
    }
}
