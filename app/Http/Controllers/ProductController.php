<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $record=Product::get();
       return response()->json(['success'=>1,'data'=>$record], 200,[],JSON_NUMERIC_CHECK);

    }
    public function getProductById($id)
    {
        $record=Product::where('id',$id)->first();
        return response()->json(['success'=>1,'data'=>$record], 200,[],JSON_NUMERIC_CHECK);

    }

    public function getProductsByProductCategoryId($id){
        $record=Product::where('product_category_id',$id)->get();
        return response()->json(['success'=>1,'data'=>$record], 200,[],JSON_NUMERIC_CHECK);
    }


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
        $product= new Product();
        $product -> product_code= $request->product_code;
        $product -> product_name= $request->product_name;
        $product -> product_category_id= $request->product_category_id;
        $product -> save();
        return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = new Product();
        $product=Product::findOrFail($request->input('id'));
        $product->product_code = $request->input('product_code');
        $product->product_name =$request->input('product_name');
        $product->update();
        return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }
    public function updateById(Request $request, $id)
    {
        $product = new Product();
        $product=Product::findOrFail($id);
        $product->product_code = $request->input('product_code');
        $product->product_name =$request->input('product_name');
        $product->update();
        return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product= Product::findOrFail($id);
        $result=$product->delete();
        return response()->json(['success'=>$result,'id'=>$id], 200);

    }
}
