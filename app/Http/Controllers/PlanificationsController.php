<?php

namespace App\Http\Controllers;

use App\Models\Planifications;
use Illuminate\Http\Request;

class PlanificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planification= Planifications::get();
        echo json_encode($planification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $planification= Planifications::create($request->all());
        echo json_encode($planification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planifications  $planification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planifications $planification)
    {
        $planification->update($request->all());
        echo json_encode($planification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planifications  $planification
     * @return \Illuminate\Http\Response
     */
    public function destroy($product, $albara_sortida)
    {
        $planifications = Planifications::where('product_id', $product)
        ->where('albara_sortida', $albara_sortida)        
        ->delete();

        echo json_encode($planifications);
    }

    public function getPlanification($albara_sortida){

        $planification= Planifications::select('planifications.planification_id','planifications.albara_sortida','planifications.product_id', 'products.description_prod', Planifications::raw("COUNT(*) as num_palets"))
        ->where('albara_sortida', '=', $albara_sortida)
        ->join('products', 'products.product_id', '=', 'planifications.product_id')
        ->groupBy('product_id')
        ->get();
            echo json_encode($planification);
        }

    public function getPlanifications($albara_sortida){

        $planification= Planifications::select('planifications.albara_sortida','planifications.product_id', 'products.description_prod')
        ->where('albara_sortida', '=', $albara_sortida)
        ->join('products', 'products.product_id', '=', 'planifications.product_id')
        ->get();
            echo json_encode($planification);
    }

    public function num_pal_sortida($albara)
    {

        $num_pal = Planifications::where('albara_sortida', '=', $albara)->count();
        echo json_encode($num_pal);
    }
}
