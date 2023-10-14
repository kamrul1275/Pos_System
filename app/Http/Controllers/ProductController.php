<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
        "success" => true,
        "message" => "Product List",
        "data" => $products
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $products = new Product();
        $products->category= $request->category;
        $products->price= $request->price;
        $products->save();
          
        $msg="Product added succesfully";
        return response()->json(['success'=>$msg],201);
    }//end method


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::find($product);
        return response()->json([
        "success" => true,
        "message" => "Product List",
        "data" => $product
        ]);

    }//end method


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->category= $request->category;
        $product->price= $request->price;
        $product->save();
        $msg="Product Update succesfully";
        return response()->json(['success'=>$msg],201);

    }//end method


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $msg="Product Delete succesfully";
        return response()->json(['success'=>$msg],201);

    }//end method
}
