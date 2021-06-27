<?php

namespace App\Http\Controllers\Admin;

use App\Sponsor;
use App\Apartment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;


class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($apartment)
    {
        $apartments = Apartment::where('id','=', $apartment)->first();
        $sponsors = Sponsor::all();

        return view('admin.sponsors.index', compact('sponsors','apartments'));
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
        dd($request);
        $sponsor = Sponsor::where('id','=', $request->sponsor_type)->first();

        $now = Carbon::now();
        $expirate_date = Carbon::now()->addHours($sponsor->duration);        
        $sponsor->apartments()->attach($request['apartment_id'],['expiration_date'=> $expirate_date]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
