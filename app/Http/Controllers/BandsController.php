<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BandsController extends Controller
{
  /**
     * Display a listing of carts
     *
     * @return Response
     */
    public function index()
    {
        
    }
    /**
     * Show the form for creating a new cart
     *
     * @return Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created cart in storage.
     *
     * @return Response
     */
    public function store()
    {
    
    }
    /**
     * Display the specified cart.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($band)
    {
        switch($band){
            case 'theillustrator':
                return view('bands.sponsored.illustrator');
            break;
            case 'adventurer':
                return view('bands.sponsored.adventurer');
            break;
            case 'storiesuntold':
                return view('bands.sponsored.storiesuntold');
            break;
            case 'thebansheepilot':
                return view('bands.sponsored.banshee');
            break;
        
        }
    }
    /**
     * Show the form for editing the specified cart.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified cart in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
 
    }
    /**
     * Remove the specified cart from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }
}
