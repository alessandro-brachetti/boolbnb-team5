<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::with('services');
    
        $results = $apartments->get();

        return response()->json([
            'data' => $results,
            'success' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        // // dd($request->service);
        // // $data = $request['service'];
        // $prova = ['service_name' => ['WIFI','Posto macchina']];

        
        
        // // $prova = explode(',', $request->service);
        // // $array = [];
        // // for ($i=0; $i < count($prova) ; $i++) { 
        // //     $array[] = ['service_name'=> $prova[$i]];
        // // }
        // // dd($array);

        // $apartments = Apartment::whereHas('services', function($query) use ($prova) {        
        //     $query->where('service_name' => ['WIFI','Posto macchina']);             
        // })->get();

        // dd($apartments);

        // return response()->json([
        //     'data' => $request->service,
        //     'success' => true,
        // ]);

    }
}
