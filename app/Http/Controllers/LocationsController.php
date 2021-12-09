<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations= Locations::get();
        echo json_encode($locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locations= Locations::create($request->all());
        echo json_encode($locations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Locations  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['location_description'] = $request['location_description'];

        Locations::where('location_id', $id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=Locations::where('location_id', $id)
        ->delete();
        echo json_encode($id);
    }

    public function getLocation($id){

        $location= Locations::where('location_id', '=', $id)->get();
            echo json_encode($location);
        }
}
