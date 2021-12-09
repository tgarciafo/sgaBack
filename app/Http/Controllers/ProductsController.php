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
        $products= Products::select('products.product_id', 'products.ean', 'products.reference', 'products.quantity', 'products.client_id', 'clients.description_client', 'products.description_prod')
        ->join('clients', 'clients.client_id', '=', 'products.client_id')
	    ->get();

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
    public function update(Request $request, $id)
    {
        $data['client_id'] = $request['client_id'];
        $data['description_prod'] = $request['description_prod'];
        $data['reference'] = $request['reference'];
        $data['ean'] = $request['ean'];
        $data['quantity'] = $request['quantity'];

        Products::where('product_id', $id)->update($data);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=Products::where('product_id', $id)
        ->delete();
        echo json_encode($id);
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

        $products= Products::select('products.product_id', 'products.ean', 'products.reference', 'products.quantity', 'products.client_id', 'clients.description_client', 'products.description_prod')
            ->join('clients', 'clients.client_id', '=', 'products.client_id')        
            ->where('products.client_id', '=', $client_id)
            ->get();

            echo json_encode($products);
        }
}
