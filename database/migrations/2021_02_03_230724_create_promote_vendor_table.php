<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoteVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promote_vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('Vendor_id')->unsigned();
            $table->string('Promote_On');
            $table->string('Date_From');
            $table->string('Date_To');
            $table->string('Promote_Status')->default('Not Approve');;
            $table->foreign('Vendor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('promote_vendor');
    }
}
