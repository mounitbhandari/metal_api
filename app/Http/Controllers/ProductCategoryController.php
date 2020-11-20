<?php

namespace App\Http\Controllers;

use App\Model\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
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


    public function edit(ProductCategory $productCategory)
    {
        //
    }


    public function update(Request $request)
    {
        $productCategory= new ProductCategory();
        $productCategory= ProductCategory::findOrFail($request->input('id'));
        $productCategory-> category_name= $request->input('category_name');
        $productCategory->update();
        return response()->json(['success'=>1,'data'=>$productCategory], 200,[],JSON_NUMERIC_CHECK);


    }
    public function isDeletable($id){
        $totalIntegrityCount = 0;
        $productCategory=ProductCategory::findorfail($id);
        $categoryCount=$productCategory->products->count();
        $totalIntegrityCount = $totalIntegrityCount + $categoryCount;
        if($totalIntegrityCount == 0){
            return response()->json(['success'=>1,'is_deleteable'=>true], 200,[],JSON_NUMERIC_CHECK);
        }else{
            return response()->json(['success'=>1,'is_deleteable'=>false], 200,[],JSON_NUMERIC_CHECK);
        }
    }

    public function delete($id)
    {
        $productCategory= ProductCategory::findorfail($id);
        $result=$productCategory->delete();
        return response()->json(['success'=>$result,'id'=>$id], 200);

    }
}
