<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display all departments from el_salvador database
       return Department::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a department in el_salvador database
        $request->validate([
            'name' => 'required',
            'capital' => 'required',
            'area' => 'required',
            'slug' => 'required',
        ]);

        return Department::create($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // display a department from el_salvador database
        return Department::find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */

    public function showBySlug($slug)
    {
        // display a department from el_salvador database
        return Department::where('slug', $slug)->firstOrFail();
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
        // create the update method for the department in el_salvador database
        $department = Department::find($id);
        $department->update($request->all());

        return $department;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete one department from el_salvador database
        return Department::destroy($id);
    }

    /**
     * Search for a name
     * @param str $name
     * @return \Illuminate\Http\Response
     * 
     */
    public function search($name)
    {
        // search for a department from el_salvador database
        return Department::where('name', 'like', '%'.$name.'%')->get();
    }

    // Create a function to get the top-5 largest departments
    /**
     * Get the top-5 largest departments
     * @return \Illuminate\Http\Response
     * 
     */
    public function topFive()
    {
        // get the top-5 largest departments from el_salvador database
        $departments = Department::all();
        $departments = $departments->sortByDesc('area')->take(5);
        return $departments;
    }
}