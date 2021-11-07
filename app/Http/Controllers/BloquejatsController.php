<?php

namespace App\Http\Controllers;

use App\Models\Bloquejats;
use Illuminate\Http\Request;

class BloquejatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $block= Bloquejats::get();
        echo json_encode($block);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bloquejats= Bloquejats::create($request->all());
        echo json_encode($bloquejats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bloquejats  $bloquejats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bloquejats $bloquejats)
    {
        $bloquejats->update($request->all());
        echo json_encode($bloquejats);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bloquejats  $bloquejats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bloquejats $bloquejats)
    {
        $bloquejats->delete();
        echo json_encode($bloquejats);
    }

    public function getBloquejat($id){

        $bloquejats= Bloquejats::where('bloquejat_id', '=', $id)->get();
            echo json_encode($bloquejats);
    }

    public function getBloquejats(){

        $bloquejats= Bloquejats::select('palets.sscc', 'clients.description_client','products.description_prod', 'palets.caducitat', 'locations.location_description')
        ->leftJoin('palets', 'palets.sscc','=', 'bloquejats.sscc')
        ->leftJoin('clients', 'clients.client_id','=', 'palets.client_id')
        ->leftJoin('products', 'products.product_id','=', 'palets.product_id')
        ->leftJoin('locations', 'locations.location_id', '=', 'palets.location_id')
        ->whereNull('palets.albara_sortida')
        ->get();
        
        echo json_encode($bloquejats);
    }

}
