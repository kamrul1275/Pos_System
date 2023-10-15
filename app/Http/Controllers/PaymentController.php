<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return response()->json([
        "success" => true,
        "message" => "Payment List",
        "data" => $payments
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
    public function store(StorePaymentRequest $request)
    {
        $payments = new Payment();
        $payments->order_id= $request->order_id;
        $payments->paymatent_date= $request->paymatent_date; 
        $payments->amount= $request->amount; 
        $payments->save();
          
        $msg="Payment added succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $payment = Product::find($payment);
        return response()->json([
        "success" => true,
        "message" => "Payment List",
        "data" => $payment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
       
        $payment->order_id= $request->order_id;
        $payment->paymatent_date= $request->paymatent_date; 
        $payment->amount= $request->amount; 
        $payment->save();
          
        $msg="Payment update succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        $msg="Payment Delete succesfully";
        return response()->json(['success'=>$msg],200);
    }
}
