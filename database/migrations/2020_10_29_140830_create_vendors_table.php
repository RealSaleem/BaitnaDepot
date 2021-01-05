<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name_en',150)->nullable();
            $table->string('name_ar',150)->nullable();
            $table->json('services')->comment('1=ecommerce, 2=contractor, 3=heavy trucks');
            $table->string('logo',255)->nullable();
            $table->json('ecommerce_store_details')->nullable();
            $table->json('contractor_details')->nullable();
            $table->json('heavy_truck_details')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
