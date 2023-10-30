<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::all();
        return response()->json([
        "success" => true,
        "message" => "Employees List",
        "data" => $employees
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
    public function store(StoreEmployeesRequest $request)
    {
        $employees = new Employees();
        $employees->first_name= $request->first_name;
        $employees->last_name= $request->last_name;
        //$employees->birthday= $request->birthday;
        $employees->save(); 
        $msg="Employees added succesfully";
        return response()->json(['success'=>$msg],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employees)
    {
        $employees = Employees::find($employees);
        return response()->json([
        "success" => true,
        "message" => "Employees List",
        "data" => $employees
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       return  $employees = Employees::find($id);
        return response()->json([
        "success" => true,
        "message" => "Employees List",
        "data" => $employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeesRequest $request, Employees $employees)
    {
        $employees->first_name= $request->first_name;
        $employees->last_name= $request->last_name;
        //$employees->birthday= $request->birthday;
        $employees->save(); 
        $msg="Employees Update succesfully";
        return response()->json(['success'=>$msg],200);
    }

    /**
     * Remove the specified resource from storage.
     */
 



    public function destroy($id)
    {
        $employees = Employees::findOrFail($id);
        $employees->delete();
        $msg="employe Delete succesfully";
        return response()->json(['success'=>$msg],200);
    }





}
