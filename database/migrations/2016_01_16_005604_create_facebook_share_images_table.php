<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookShareImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_share_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('main_image');
            $table->string('title');
            $table->text('description');
            $table->string('photographer');
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
        Schema::drop('facebook_share_images');
    }
}
