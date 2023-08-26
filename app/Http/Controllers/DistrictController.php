<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all districts
        $districts = District::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store a district
        $request->validate([
            'name' => 'required',
            'area' => 'required',
            'municipality_id' => 'required',
            'department_id' => 'required',
            'zone_id' => 'required',
            'flag' => 'required',
            'population' => 'required',
            'coordinates' => 'required',
            'itHasBeach' => 'required',
            'itHasLake' => 'required',
            'itHasVolcano' => 'required',
        ]);

        return json_encode(District::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a district
        return json_encode(District::find($id));
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
        // update a district
        $district = District::find($id);
        $district->update($request->all());

        return json_encode($district);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // destroy a district
       return District::destroy($id);
    }
}