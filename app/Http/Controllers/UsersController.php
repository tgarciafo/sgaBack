<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= Users::get();
        echo json_encode($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users= Users::create($request->all());
        echo json_encode($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id){

        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['password'] = $request['password'];
        $data['type'] = $request['type'];
        $data['client_id'] = $request['client_id'];

        Users::where('user_id', $id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=Users::where('user_id', $id)
        ->delete();
        echo json_encode($id);
    }

    public function getUser($id){

        $user= Users::where('user_id', '=', $id)->get();
            echo json_encode($user);
    }

    public function getUsers(){

        $user= Users::select('users.user_id', 'users.name', 'users.password', 'users.email', 'users.type', 'users.client_id', 'clients.description_client')
        ->leftJoin('clients', 'clients.client_id', '=', 'users.client_id')
        ->get();
            echo json_encode($user);
        }
}
