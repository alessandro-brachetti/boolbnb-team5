<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($apartment)
    {
        $hostapartment = Apartment::where('id', '=', $apartment)->first();
        $messages = Message::where('apartment_id', '=', $apartment)->get();

        if (Auth::user()->id == $hostapartment->user_id){
            return view('admin.messages.index', compact('messages'));
        }
      return redirect()->route('guests.show', compact('apartment'));
    }

}
