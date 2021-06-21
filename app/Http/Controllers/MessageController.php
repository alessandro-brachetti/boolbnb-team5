<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|nullable|max:25',
            'lastname' => 'string|nullable|max:25',
            'email' => 'required|email',
            'message' => 'required|string|max:255'
        ]);

        $data = $request->all();

        $message = new Message();
        $message->create($data);

        return redirect()->back();
    }    
}
