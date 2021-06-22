<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('welcome', compact('apartments'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {   
        return view('guests.show', compact('apartment'));
    }

}
