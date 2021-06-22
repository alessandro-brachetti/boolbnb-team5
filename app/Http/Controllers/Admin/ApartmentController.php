<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'title' => 'required| unique:apartments| max:255',
            'n_rooms' => 'required|numeric',
            'n_beds' => 'required|numeric',
            'n_bathrooms' => 'required|numeric',
            'mq' => 'required|numeric',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'img' => 'required|max:2000',
            'visible' => 'required|boolean',
            'service_ids.*' => 'exists:services,id'
        ]);
        $data = $request->all();

        $image = NULL;
        if(array_key_exists('img', $data)){
            $image = Storage::put('uploads', $data['img']);
        }

        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->img = 'storage/'. $image;
        $apartment->save();

        if(array_key_exists('service_ids', $data)){
            $apartment->services()->attach($data['service_ids']);
        }

        return redirect()->route('admin.apartments.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        if (Auth::user()->id == $apartment->user_id) {
            return view('admin.apartments.show', compact('apartment'));
        }

        return redirect()->route('guests.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {

        $services = Service::all();

        if (Auth::user()->id == $apartment->user_id) {
            return view('admin.apartments.edit', compact('apartment', 'services'));
        }

        return redirect()->route('guests.show', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'title' => 'required|max:255',
            'n_rooms' => 'required|numeric',
            'n_beds' => 'required|numeric',
            'n_bathrooms' => 'required|numeric',
            'mq' => 'required|numeric',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,jpg,png,gif,svg,bmp|max:2000',
            'visible' => 'required|boolean',
            'service_ids.*' => 'exists:services,id'
        ]);

        $data = $request->all();

        $image = NULL;
        if(array_key_exists('img', $data)){
            $image = Storage::put('uploads', $data['img']);
            $data['img'] = 'storage/'. $image;
        }
        $apartment->update($data);

        if(array_key_exists('service_ids', $data)){
            $apartment->services()->sync($data['service_ids']);
        } else {
            $apartment->services()->detach();
        }

        return redirect()->route('admin.apartments.show', $apartment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
