<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->timestamps();
           // $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('user_id');
            //$table->unsignedBigInteger('user_id');
           // $table->softDeletes();
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
        Schema::dropIfExists('image_gallery');
    }
}
