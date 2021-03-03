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
            $table->date('Date_From');
            $table->date('Date_To');
            $table->tinyInteger('Promote_Status')->default(0)->comment('0=requested, 1=approved, 2=declined, 3=expired');
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
