<?php

namespace App\Http\Controllers;

use App\Models\Palets;
use Illuminate\Http\Request;

class PaletsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $palets= Palets::get();
        echo json_encode($palets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $palets= Palets::create($request->all());
        echo json_encode($palets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Palets  $palets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Palets $palets)
    {
        $palets->update($request->all());
        echo json_encode($palets);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Palets  $palets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Palets $palets)
    {
        $palets->delete();
        echo json_encode($palets);
    }

    public function getPalet($sscc){

        $palet= Palets::where('sscc', '=', $sscc)->get();
            echo json_encode($palet);
        }

    public function num_pal($albara)
    {

        $num_pal = Palets::where('albara_entrada', '=', $albara)->count();
        echo json_encode($num_pal);
    }

    public function showEntries($data, $data2)
   {
        $entrada= Palets::select('palets.albara_entrada', 'palets.data_entrada', 'palets.client_id', 'clients.description_client', Palets::raw("COUNT(*) as num_palets"))
        ->whereBetween('data_entrada', [$data, $data2])
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->groupBy("albara_entrada", 'data_entrada', 'client_id', 'description_client')
	    ->get();

        echo json_encode($entrada);
    }

    public function showPalEntries($num_albara)
   {
        $palEntrada= Palets::select('palets.albara_entrada', 'palets.data_entrada', 'palets.sscc', 'products.quantity', 'palets.lot', 'palets.caducitat', 'products.description_prod' )
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->where('albara_entrada', '=', $num_albara)
	    ->get();

        echo json_encode($palEntrada);
    }

    public function getPalResta($product_id){
        $numPal = Palets::where('product_id', '=', $product_id, 'and', 'data_sortida', 'is', 'null')->count();
        echo json_encode($numPal);
    }

    public function showExpeditions($data, $data2)
   {
        $sortida= Palets::select('palets.albara_sortida', 'palets.data_sortida', 'palets.client_id', 'clients.description_client', Palets::raw("COUNT(*) as num_palets"))
        ->whereBetween('data_sortida', [$data, $data2])
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->groupBy("albara_sortida", 'data_sortida', 'client_id', 'description_client')
	    ->get();

        echo json_encode($sortida);
    }

    public function showPalExpeditions($num_albara)
   {
        $palSortida= Palets::select('palets.albara_sortida', 'palets.data_sortida', 'palets.sscc', 'products.quantity', 'palets.lot', 'palets.caducitat', 'products.description_prod' )
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->where('albara_sortida', '=', $num_albara)
	    ->get();

        echo json_encode($palSortida);
    }

    public function expeditionPal($sscc, $albara_sortida, $data_sortida){
        $result= Palets::where('sscc', $sscc)
        ->update(array('albara_sortida'=>$albara_sortida, 'data_sortida' =>$data_sortida));

        $palet = Palets::where('sscc', $sscc)
        ->get();

        echo json_encode($palet);
    }

    public function estocClient($idClient, $data){
        $estoc= Palets::select('products.description_prod', 'palets.caducitat', 'clients.description_client',Palets::raw("COUNT(*) as num_palets"))
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->where('palets.client_id', '=', $idClient)
        ->where('palets.data_entrada', '<=', $data)
        ->where(function ($query)  use ($data) {
            $query->where('palets.data_sortida', '>', $data)
            ->orWhereNull('palets.data_sortida');
        })        
        ->groupBy('palets.caducitat', 'products.description_prod')
        ->get();

        echo json_encode($estoc);
    }

    public function estocProduct($product_id, $data){
        $estoc= Palets::select('products.description_prod', 'palets.caducitat', 'clients.description_client',Palets::raw("COUNT(*) as num_palets"))
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->where('palets.product_id', '=', $product_id)
        ->where('palets.data_entrada', '<=', $data)
        ->where(function ($query)  use ($data) {
            $query->where('palets.data_sortida', '>', $data)
            ->orWhereNull('palets.data_sortida');
        })        
        ->groupBy('palets.caducitat')
        ->get();

        echo json_encode($estoc);
    }

    public function estocUbicacio($client_id, $location_id, $data){

        if ($client_id != '0'){

        $estoc= Palets::select('products.description_prod', 'locations.location_description', 'palets.caducitat', 'clients.description_client',Palets::raw("COUNT(*) as num_palets"))
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->join('locations', 'locations.location_id', '=', 'palets.location_id')
        ->where('palets.location_id', '=', $location_id)
        ->where('palets.client_id', '=', $client_id)
        ->where('palets.data_entrada', '<=', $data)
        ->where(function ($query)  use ($data) {
            $query->where('palets.data_sortida', '>', $data)
            ->orWhereNull('palets.data_sortida');
        })        
        ->groupBy('palets.caducitat')
        ->get();

        echo json_encode($estoc);

    } else {

        $estoc= Palets::select('products.description_prod', 'locations.location_description', 'palets.caducitat', 'clients.description_client',Palets::raw("COUNT(*) as num_palets"))
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->join('locations', 'locations.location_id', '=', 'palets.location_id')
        ->where('palets.location_id', '=', $location_id)
        ->where('palets.data_entrada', '<=', $data)
        ->where(function ($query)  use ($data) {
            $query->where('palets.data_sortida', '>', $data)
            ->orWhereNull('palets.data_sortida');
        })        
        ->groupBy('palets.caducitat')
        ->get();

        echo json_encode($estoc);
    }

    }

    public function estocAlbara($num_albara){

        $estoc= Palets::select('palets.albara_entrada', 'palets.data_entrada', 'palets.albara_sortida', 'palets.data_sortida', 'products.quantity', 'palets.lot', 'palets.sscc', 'products.description_prod', 'palets.caducitat', 'clients.description_client')
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->where('palets.albara_entrada', '=', $num_albara)
        ->orwhere('palets.albara_sortida', '=', $num_albara)  
        ->get();

        echo json_encode($estoc);
    }

    public function estocLot($client_id, $product_id, $data){

        if ($product_id != '0'){

        $estoc= Palets::select('products.description_prod', 'palets.caducitat', 'clients.description_client', 'palets.lot', Palets::raw("COUNT(*) as num_palets"))
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->where('palets.product_id', '=', $product_id)
        ->where('palets.data_entrada', '<=', $data)
        ->where(function ($query)  use ($data) {
            $query->where('palets.data_sortida', '>', $data)
            ->orWhereNull('palets.data_sortida');
        })        
        ->groupBy('palets.lot')
        ->get();

        echo json_encode($estoc);

    } else {

        $estoc= Palets::select('products.description_prod', 'palets.caducitat', 'clients.description_client', 'palets.lot', Palets::raw("COUNT(*) as num_palets"))
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->join('locations', 'locations.location_id', '=', 'palets.location_id')
        ->where('palets.client_id', '=', $client_id)
        ->where('palets.data_entrada', '<=', $data)
        ->where(function ($query)  use ($data) {
            $query->where('palets.data_sortida', '>', $data)
            ->orWhereNull('palets.data_sortida');
        })        
        ->groupBy('palets.lot')
        ->get();

        echo json_encode($estoc);
    }

    }

    public function consultaSSCC($num_sscc){

        $consulta= Palets::select('palets.albara_entrada', 'palets.data_entrada', 'palets.albara_sortida', 'palets.data_sortida', 'products.quantity', 'palets.lot', 'palets.sscc', 'products.description_prod', 'palets.caducitat', 'clients.description_client')
        ->join('products', 'products.product_id', '=', 'palets.product_id')
        ->join('clients', 'clients.client_id', '=', 'palets.client_id')
        ->where('palets.sscc', '=', $num_sscc)
        ->get();

        echo json_encode($consulta);
    }

}
