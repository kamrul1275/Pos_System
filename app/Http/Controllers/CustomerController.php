<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json([
        "success" => true,
        "message" => "Customer List",
        "data" => $customers
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
    public function store(StoreCustomerRequest $request)
    {
        $customers = new Customer();
        $customers->first_name= $request->first_name;
        $customers->last_name= $request->last_name;
        $customers->money= $request->money;
        $customers->created_by= Auth::user()->id;
        //return Auth::user()->id;
        $customers->save();
          
        $msg="Customer added succesfully";
        return response()->json(['success'=>$msg],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $customer = Customer::find($customer);
        return response()->json([
        "success" => true,
        "message" => "edit Customer List",
        "data" => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->first_name= $request->first_name;
        $customer->last_name= $request->last_name;
        $customer->money= $request->money;
        $customer->modified_by= Auth::user()->id;
        $customer->save();
          
        $msg="Customer Updete succesfully";
        return response()->json(['success'=>$msg],200);
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        $msg="Customer Delete succesfully";
        return response()->json(['success'=>$msg],200);
    }

}
