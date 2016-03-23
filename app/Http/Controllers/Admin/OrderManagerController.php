<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   
        $exclude = \App\EventCheckin::lists('sale_checkin_id');
        $ticketsales = \App\Sale::where('created_at', '>', \Carbon::parse('1/31/2016'))->whereNotIn('cart_id', $exclude)->with('cartsBySale', 'cartsBySale.product')->get();
        $checkedin = \App\Sale::where('created_at', '>', \Carbon::parse('1/31/2016'))->WhereIn('cart_id', $exclude)->with('cartsBySale', 'cartsBySale.product')->get();
        return view('orders.index', compact('ticketsales', 'checkedin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
