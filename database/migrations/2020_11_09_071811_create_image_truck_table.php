<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTruckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_truck', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_id')->unsigned();
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');
            $table->string('image', 255)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('image_truck');
    }
}
