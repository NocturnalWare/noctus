<?php 

namespace App\Shipping\Handlers;

use App\Cart;
use App\Shipping;
use App\Slack\SlackHandler;
use GuzzleHttp\Exception\ClientException;
use EasyPost\EasyPost;

class ShippingHandler
{
    private $slacker;

    public function __construct(){
        $this->slacker = new SlackHandler;
        $this->payment = new PaymentHandler;
    }

    public function buildSale(){

    }

    public function sendSaleMessage(){
        return $this->slacker->sendSaleMessage($this->buildLabel());
    }

    public function getShipping(){
        return Shipping::where('cart_id', \Session::get('cart_id'))->first();
    }

    public function buildLabel(){
        EasyPost::setApiKey(env('EASYPOST'));

        $shipping = $this->getShipping();
        $to_address = \EasyPost\Address::create(
            array(
                "name"    => "$shipping->ship_f_name $shipping->ship_l_name",
                "street1" => "$shipping->ship_address1",
                "street2" => "$shipping->ship_address2",
                "city"    => "$shipping->ship_city",
                "state"   => "$shipping->ship_state",
                "zip"     => "$shipping->ship_zip",
                "phone"   => "$shipping->phone"
            )
        );
        $from_address = \EasyPost\Address::create(
            array(
                "company" => "Eternally Nocturnal",
                "street1" => "31211 Westfield",
                "city"    => "Livonia",
                "state"   => "MI",
                "zip"     => "48240",
                "phone"   => "313-515-5094"
            )
        );
        $parcel = \EasyPost\Parcel::create(
            array(
                "predefined_package" => "SmallFlatRateBox",
                "weight" => 1.0
            )
        );
        $shipment = \EasyPost\Shipment::create(
            array(
                "to_address"   => $to_address,
                "from_address" => $from_address,
                "parcel"       => $parcel
            )
        );

        $shipment->buy($shipment->lowest_rate());

        $shipment->insure(array('amount' => 100));

        $link = $shipment->postage_label->label_url;
        return $link;
        $this->slacker->sendShippingLabel($link);

        // return view('shipping.showlabel', compact('link'));
    }   

}