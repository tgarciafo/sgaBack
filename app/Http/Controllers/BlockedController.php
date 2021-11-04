<?php

namespace App\Http\Controllers;

use App\Models\Blocked;
use Illuminate\Http\Request;

class BlockedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $block= Blocked::get();
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
        $block= Blocked::create($request->all());
        echo json_encode($block);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blocked  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blocked $block)
    {
        $block->update($request->all());
        echo json_encode($block);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blocked  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blocked $block)
    {
        $block->delete();
        echo json_encode($block);
    }

    public function getBlock($id){

        $block= Blocked::where('block_id', '=', $id)->get();
            echo json_encode($block);
        }
}
