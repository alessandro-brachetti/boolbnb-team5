<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Apartment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = Carbon::now();
        $apartments_get = Apartment::where('user_id', '=', Auth::user()->id)->with('sponsors')->whereHas('sponsors')->get();
        // dd($apartments_get);
        $apartments = [];
        foreach ($apartments_get as $apartment) {
            foreach ($apartment->sponsors as $sponsor) {
                if (($now)->gt($sponsor->pivot->expiration_date) == false && !in_array($apartment, $apartments)) {
                    $apartments[] = $apartment;
                }
            }
        }
        return view('admin.dashboard', compact('apartments'));
    }
}
