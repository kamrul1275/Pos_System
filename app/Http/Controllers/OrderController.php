<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json([
        "success" => true,
        "message" => "Order List",
        "data" => $orders
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
        $orders = new Order();
        $orders->customer_id= $request->customer_id;
        $orders->employer_id= $request->employer_id;
        $orders->product_id= $request->product_id;
        $orders->total_order= $request->total_order;
        $orders->order_date= $request->order_date;
        $orders->created_by= Auth::user()->id;
        $orders->save(); 
        $msg="Oder added succesfully";
        return response()->json(['success'=>$msg],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = Order::find($order);
        return response()->json([
        "success" => true,
        "message" => "Edit Order List",
        "data" => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->customer_id= $request->customer_id;
        $order->employer_id= $request->employer_id;
        $order->product_id= $request->product_id;
        $order->total_order= $request->total_order;
        $order->order_date= $request->order_date;
        $order->modified_by= Auth::user()->id;
        $order->save(); 
        $msg="Order update succesfully";
        return response()->json(['success'=>$msg],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete(); 
        $msg="Order delete succesfully";
        return response()->json(['success'=>$msg],200);
    }
}
