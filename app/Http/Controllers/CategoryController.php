<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::all();
        return response()->json([
        "success" => true,
        "message" => "Category List",
        "data" => $categorys
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
    public function store(StoreCategoryRequest $request)
    {
        $categorys = new Category();
        $categorys->category_name= $request->category_name;
        $categorys->details= $request->details;
        $categorys->created_by= Auth::user()->id;
        $categorys->save();
          
        $msg="Category added succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        $category = Category::find($category);
        return response()->json([
        "success" => true,
        "message" => "Edit Category List",
        "data" => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->category_name= $request->category_name;
        $category->details= $request->details;
        $category->modified_by= Auth::user()->id;
        $category->save();
        $msg="Category update succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $msg="Category Delete succesfully";
        return response()->json(['success'=>$msg],200);
    }
}
