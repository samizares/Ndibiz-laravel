<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessprofile', function (Blueprint $table) {
			 $table->engine = 'InnoDB';
             $table->increments('id')->unsigned();
			 $table->string('name');
			 $table->string('address', 500);
			 $table->string('contactname',255);
			 $table->string('email')->unique();
			 $table->string('website', 255);
			 $table->integer('phone1')->nullable();
			 $table->integer('phone2')->nullable();
             $table->timestamps();
			 $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('businessprofile');
    }
}
