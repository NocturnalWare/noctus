<?php 

namespace App\Shipping\Handlers;

use App\Cart;
use App\Shipping;
use App\ShippingLabel;
use App\Slack\SlackHandler;
use GuzzleHttp\Exception\ClientException;
use EasyPost\EasyPost;

class ShippingHandler
{
    private $slacker;

    public function __construct(){
        EasyPost::setApiKey(env('EASYPOST'));
        $this->slacker = new SlackHandler;
    }

    public function buildSale(){

    }

    public function sendSaleMessage(){
        return $this->slacker->sendSaleMessage();
    }

    public function getShipping($id){
        return Shipping::where('cart_id', $id)->first();
    }

    public function showLabel($url){
        return view('shipping.showlabel', compact('url'));
    }

    public function buildLabel($id){
        $shipping = $this->getShipping($id);
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
                "weight" => 16.0
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

        ShippingLabel::create([
            'cart_id' => $id,
            'easypost_id' => $shipment->postage_label->id,
            'tracking_code' => $shipment->tracking_code,
            'easypost_tracking' => $shipment->tracker->id,
            'label_url' => $shipment->postage_label->label_url,
            'created' => $shipment->postage_label->created_at,
            'rate' => $shipment->selected_rate->rate,
            'carrier' => $shipment->selected_rate->carrier,
            'shipment_id' => $shipment->selected_rate->shipment_id,
        ]);

        Shipping::where('cart_id', $id)->update(['shipped_status' => 'SHIPPED', 'tracking_number' => $shipment->tracking_code]);

        $link = $shipment->postage_label->label_url;

        $this->slacker->sendShippingLabel($link);

        return redirect()->route('salesmanager.index');
    }   

    public function trackPackage($id){
        $track = ShippingLabel::where('cart_id', $id)->first();

        $check = \EasyPost\Tracker::retrieve($track->easypost_tracking);
        if($check->status == 'delivered'){
            Shipping::where('cart_id', $id)->update(['shipped_status' => 'DELIVERED', 'tracking_number' => $check->updated_at]);
            return redirect()->route('salesmanager.index');
        }

        Shipping::where('cart_id', $id)->update(['shipped_status' => 'SHIPPED', 'tracking_number' => $check->tracking_code]);
        return view('shipping.status', compact('check'));
    }

}