<?php

namespace App\Http\Controllers;

use App\Cart\Handlers\CheckoutHandler;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SlackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(CheckoutHandler $checkout)
    {
        return $checkout->testShipping(3);
        // $total = '$43.99';
        // $items = [];

        // foreach(range(10,13) as $rang){
        //     $items[] = ['title' => "Item $rang"];
        //     $items[] = ['title' => "Price: $rang.99"];
        //     $items[] = ['title' => "Quantity: $rang"];
        // }

        // \Slack::attach([
        //     'fallback' => 'It is all broken, man',
        //     'text' => 'We sold some stuff.',
        //     'pretext' => "Total: $total",
        //     'color' => 'good',
        //     'fields' => $items,

        // ])->send('New WEB Sale!');

        // sleep(2);

        // \Slack::send('Ship To:
        //     Joe Tavares
        //     20407 Glenmore
        //     Redford MI, 48240');
       
//         \Slack::send('New Sale:
//             Mank Beast
//             Small 19.99 
//                             Total: 24.98
// Ship to:
//             Joe Tavares
//             20407 Glenmore 
//             Redford MI, 48240');
// $customer = \App\Shipping::first()

//         \Slack::send('New Sale:
//             Mank Beast
//             Small 19.99 
//                             Total: 24.98
// Ship to:
//             '+$customer->ship_f_name $customer->ship_l_name<br>
// $customer->ship_address1 $customer->ship_address2<br>
// $customer->ship_city $customer->ship_state, $customer->ship_zip');



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
