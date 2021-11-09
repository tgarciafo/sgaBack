<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients= Clients::get();
        echo json_encode($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clients= Clients::create($request->all());
        echo json_encode($clients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        $clients->update($request->all());
        echo json_encode($clients);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        $clients->delete();
        echo json_encode($clients);
    }

    public function getClient($id){

        $client= Clients::where('client_id', '=', $id)->get();
            echo json_encode($client);
    }

    public function addUserClient($client_id, $user_id){

        $client= Clients::where('client_id', '=', $client_id)
            ->update(array('user_id' => $user_id));
            echo json_encode($client);
    }

}
