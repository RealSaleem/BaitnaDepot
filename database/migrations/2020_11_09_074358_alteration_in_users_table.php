<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterationInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('mobile')->nullable();
            $table->integer('type')->comment('1=Vendor, 2=Mobile application user');
            $table->boolean('status')->default('0')->comment('0=inactive,1=active');
            $table->boolean('is_approved')->default('0')->comment('0=unapprove,1=approved');
            $table->string('username')->after('name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->softDeletes();
            $table->integer('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
