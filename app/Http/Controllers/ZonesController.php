<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Zones;
class ZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all zones from zones database
        return Zones::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a zone in zones database
        $request->validate([
            'name' => 'required'
        ]);

        return json_encode(Zones::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a zone based on id from zones database
        return json_encode(Zones::find($id));
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
        // update data from zones database
        $zone = Zones::find($id);
        $zone->update($request->all());

        return $zone;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a zone from zones database based on id
        $zone = Zones::find($id);
        $zone->delete();

        return 204;
    }
}