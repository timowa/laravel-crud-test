<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query();
        if(\request()->has('availableOnly')) $products = $products->available();
        $products = $products->orderBy('created_at','asc')->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validator = $request->validated();
        $data = [];
        $attrNames = array_diff($request->attrName,array(''));
        $attrValues =  array_diff($request->attrValue,array(''));
        if(count($attrNames)>0 && count($attrValues)>0 && count($attrNames) == count($attrValues)){
            for( $i = 0;$i<count($attrNames); $i++ ){
                $data[]=[
                    'name'=>$attrNames[$i],
                    'value'=>$attrValues[$i]
                ];
            }
        }else{
            $data=null;
        }

        $request->merge(['data'=>json_encode($data)]);
        $product= Product::create($request->all());
        return response()->json(['success'=>true,'message'=>'Товар '.$product->name.' успешно создан']);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $product = Product::find($product->id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, product $product)
    {
        $validator = $request->validated();
        $data = [];
        $attrNames = array_diff($request->attrName,array(''));
        $attrValues =  array_diff($request->attrValue,array(''));
        if(count($attrNames)>0 && count($attrValues)>0 && count($attrNames) == count($attrValues)){
            for( $i = 0;$i<count($attrNames); $i++ ){
                $data[]=[
                    'name'=>$attrNames[$i],
                    'value'=>$attrValues[$i]
                ];
            }
        }else{
            $data=null;
        }

        $request->merge(['data'=>json_encode($data)]);
        $product->name = $request->name;
        if(auth()->user()->is_admin)
            $product->article = $request->article;
        $product->data = $request->data;
        $product->status = $request->status;
        $product->save();
        return response()->json(['success'=>true,'message'=>'Товар '.$product->name.' успешно изменен']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $id)
    {
        $product =  Product::find($id)->first;
        $name = $product->first()->name;
        $product->delete();
        return redirect(route('product.index'))->with(['success'=>true,'message'=>'Продукт '.$name.' успешно удален.']);
    }
}
