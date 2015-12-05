<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductShippingsTable extends Migration
{
    public function up()
    {
        Schema::create('shippings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sale_id');
            $table->integer('shipped');
            $table->string('label');
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
        Schema::drop('shippings');
    }
}
