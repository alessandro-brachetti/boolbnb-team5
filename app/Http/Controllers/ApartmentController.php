<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $apartments_get = Apartment::with('sponsors')->where('visible','=', 1)->whereHas('sponsors')->get();
        $apartments = [];
        foreach ($apartments_get as $apartment) {
            foreach ($apartment->sponsors as $sponsor) {
                if (($now)->gt($sponsor->pivot->expiration_date) == false && !in_array($apartment, $apartments)) {
                    $apartments[] = $apartment;
                }
            }
        }
        $apartmentsNewest = Apartment::orderBy('created_at', 'DESC')->where('visible','=', 1)->take(10)->get();
        return view('welcome', compact('apartments', 'apartmentsNewest'));
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
        if ($apartment->visible == 1) {
            return view('guests.show', compact('apartment'));
        } else {
            return abort(404);
        }
    }
}
