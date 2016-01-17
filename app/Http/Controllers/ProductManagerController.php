<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = \App\Product::with('prices', 'inventories')->get();
        return view('productmanager.index', compact('products'));
    }

    public function sendFeedback(Request $request){
        \Session::put('feedbackname', $request->input('name'));
        \Session::put('feedbackemail', $request->input('email'));
        \Session::put('feedbackmessage', $request->input('message'));


        \Mail::send('emails.feedback', array(), function($message){
            $message->to('feedback@eternallynocturnal.com', "FEEDBACK FROM ".\Session::get('feedbackname'))->subject('NEW FEEDBACK');
            $message->to('tavares.joe@gmail.com', "FEEDBACK FROM ".\Session::get('feedbackname'))->subject('NEW FEEDBACK');
        });

        \Mail::send('emails.feedbackreply', array(), function($message){
            $message->to(\Session::get('feedbackemail'), "Thanks for your message.")->subject('Thank you for your comments!');
        });

        return redirect()->route('products.index');
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

    public function facebook($id = '1'){
        $product = \App\Product::where('id', $id)->with('inventories', 'prices')->first();
        return view('productmanager.facebook', compact('product'));
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
        $categories = \App\ProductCategory::all();
        $product = \App\Product::where('id', $id)->with('inventories', 'prices')->first();
        return view('productmanager.show', compact('product', 'categories'));
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
