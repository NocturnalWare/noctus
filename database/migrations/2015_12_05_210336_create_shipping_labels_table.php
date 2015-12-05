<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingLabelsTable extends Migration
{
    public function up()
    {
        Schema::create('shipping_labels', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sale_id');
            $table->string('easypost_id');
            $table->string('tracking_code');
            $table->string('label_url');
            $table->string('label_pdf_url');
            $table->string('label_epl2_url');
            $table->string('label_zpl_url');
            $table->datetime('created');
            $table->string('rate');
            $table->string('carrier');
            $table->string('shipment_id');
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
        Schema::drop('shipping_labels');
    }
}