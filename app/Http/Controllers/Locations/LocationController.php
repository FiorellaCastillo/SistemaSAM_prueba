<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Company;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::join('companies', 'locations.location_name_id', '=', 'companies.id')
            ->join('provinces', 'locations.location_province_id', '=', 'provinces.id')
            ->select('locations.*', 'companies.company_name', 'provinces.provinces_name', 'companies.legal_company_id')

            ->get();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = new Location;
        $companies = Company::all();
        $provinces = Province::all();
        return view('locations.create', compact('locations', 'companies', 'provinces'));
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
            'location_name_id' => 'required',
            'int',
            'location_phone_number' => 'required',
            'string',
            'max:10',
            'location_province_id' => 'required',
            'int',
            'location_address' => 'required',
            'string',
            'max:250',


        ]);

        $location = new Location();

        $location->location_name_id = $request->location_name_id;
        $location->location_phone_number = $request->location_phone_number;
        $location->location_province_id = $request->location_province_id;
        $location->location_address = $request->location_address;
        $location->save();

        return redirect()->route('locations.index', $location);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}