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
            'slug' => 'required',
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

    /**
     * display the top 5 largest districts
     * @return \Illuminate\Http\Response
     *      
     */
    public function topFive()
    {
        // display the top 5 largest districts
        return json_encode(District::orderBy('area', 'desc')->take(5)->get());
    }
    /**
     * display the districts based on zone
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function showDistrictsByZone($id)
    {
        // display the districts based on zone
        return json_encode(District::where('zone_id', $id)->get());
    }
    /**
     * display the districts based on municipality
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showDistrictsByMunicipality($id)
    {
        // display the districts based on municipality
        return json_encode(District::where('municipality_id', $id)->get());
    }
    /**
     * display the districts based on department
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showDistrictsByDepartment($id)
    {
        // display the districts based on department
        return json_encode(District::where('department_id', $id)->get());
    }
    /**
     * display the top 10 most populated districts
     * @return \Illuminate\Http\Response
     */
    public function topTenMostPopulated()
    {
        // display the top 10 most populated districts
        return json_encode(District::orderBy('population', 'desc')->take(10)->get());
    }
    /**
     * Display the top ten largest districts
     * @return \Illuminate\Http\Response
     */
    public function topTenLargest()
    {
        // display the top ten largest districts
        return json_encode(District::orderBy('area', 'desc')->take(10)->get());
    }

    /**
     * Search by name
     * @param str $name
     * @return \Illuminate\Http\Response
     *
     */
    public function search($name)
    {
        // search by name
        return json_encode(District::where('name', 'like', '%'.$name.'%')->get());
    }
}