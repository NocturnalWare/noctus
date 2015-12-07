<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sort_order');
            $table->integer('product_id');
            $table->integer('active');
            $table->integer('main_image');
            $table->string('name');
            $table->text('description');
            $table->string('photographer');
            $table->string('url');
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
        Schema::drop('product_images');
    }
}
