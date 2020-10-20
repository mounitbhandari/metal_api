<?php

namespace App\Http\Controllers;

use App\Model\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record=ProductCategory::get();
        return response()->json(['success'=>1,'data'=>$record], 200,[],JSON_NUMERIC_CHECK);
    }


    public function getProductCategoryById($id)
    {
        $record=ProductCategory::where('id',$id)->first();
        return response()->json(['success'=>1,'data'=>$record], 200,[],JSON_NUMERIC_CHECK);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategory= new ProductCategory();
        $productCategory -> category_name= $request->category_name;
        $productCategory ->save();
        return response()->json(['success'=>1,'data'=>$productCategory], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $productCategory= new ProductCategory();
        $productCategory= ProductCategory::findOrFail($request->input('id'));
        $productCategory-> category_name= $request->input('category_name');
        $productCategory->update();
        return response()->json(['success'=>1,'data'=>$productCategory], 200,[],JSON_NUMERIC_CHECK);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
