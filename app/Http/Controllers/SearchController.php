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
        $apartments = Apartment::with('services')->where('visible', '=', 1);
    
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
        // dd($request->input());
        // // $data = $request['service'];
        $prova = $request->input('service');
        // $array = ['WIFI', 'Posto macchina'];
      

        $query = Apartment::with('services');
        foreach($prova as $service){
        $query->whereHas('services', function($q) use ($service){
        $q->where('service_name', $service);
        });
        }
        $apartments = $query->get();
        
        return response()->json([
            'data' => $apartments,
            'success' => true,
        ]);

    }
}
