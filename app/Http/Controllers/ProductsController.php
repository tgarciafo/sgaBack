<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Products::get();
        echo json_encode($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products= Products::create($request->all());
        echo json_encode($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $products->update($request->all());
        echo json_encode($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $products->delete();
        echo json_encode($products);
    }

    public function getProduct($id){

        $product= Products::where('product_id', '=', $id)->get();
            echo json_encode($product);
        }

    public function showId($ean){
        $producte= Products::where('ean', '=', $ean)->first();
        echo json_encode($producte);
    }

    public function getClientProduct($client_id){

        $products= Products::where('client_id', '=', $client_id)->get();
            echo json_encode($products);
        }
}
