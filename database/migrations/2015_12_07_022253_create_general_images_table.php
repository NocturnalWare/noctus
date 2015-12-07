<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sort_order');
            $table->integer('active');
            $table->string('type');
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
        Schema::drop('general_images');
    }
}
