<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oders = Order::all();
        return response()->json([
        "success" => true,
        "message" => "Order List",
        "data" => $oders
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
    public function store(StoreOrderRequest $request)
    {
        $oders = new Order();
        $oders->customer_id= $request->customer_id;
        $oders->employer_id= $request->employer_id;
        $oders->product_id= $request->product_id;
        $oders->total_order= $request->total_order;
        //$oders->order_date= $request->order_date;
        $oders->save(); 
        $msg="Oder added succesfully";
        return response()->json(['success'=>$msg],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
