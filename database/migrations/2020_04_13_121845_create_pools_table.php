<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->bigIncrements('id');
           // $table->string('title');
          //  $table->text('body');
           // $table->timestamps();
            //$table->softDeletes();
           $table->unsignedBigInteger('user_id');
            $table->string('caption');
           // $table->text('description');
            $table->string('image');
            //$table->softDeletes();
           // $table->softDeletes();
            $table->timestamps();
           // $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools');
    }
}
