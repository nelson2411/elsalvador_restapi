<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all municipalities from el_salvador database
        return json_encode(Municipality::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a municipality in el_salvador database
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);

        return json_encode(Municipality::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // display a municipality from el_salvador database based on id
        return json_encode(Municipality::find($id));
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
        $municipality = Municipality::find($id);
        $municipality->update($request->all());

        return json_encode($municipality);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Municipality::destroy($id);
            
    }

    /**
     * Search for a name
     * @param str $name
     * @return \Illuminate\Http\Response
     * 
     */
    public function search($name)
    {
        // search for a municipality from el_salvador database based on name
        return json_encode(Municipality::where('name', 'like', '%'.$name.'%')->get());
    }

    /**
     * Get the top-5 municipalities with more districts
     * @return \Illuminate\Http\Response
     * 
     */
    public function topFive()
    {
        // get the top-5 municipalities with more districts from el_salvador database
        return json_encode(Municipality::withCount('districts')->orderBy('districts_count', 'desc')->take(5)->get());
    }


}