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
}
