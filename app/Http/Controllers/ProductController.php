<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStorePostRequest;
use App\Http\Requests\Prodcut\ProductUpdatePutRequest;
use App\Http\Requests\Product\ProductUpdatePatchRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ProductStorePostRequest $request)
    {
        // dd($request);
        $validated = $request->validated();

        $image = time() . '-pdt' . '.' . $validated["image_file"]->extension();
        $request->file('image_file')->storeAs('products/', $image);

        $validated["image"] = $image;

        $product =  Product::create($validated);

        if ($product) {
            return redirect()->back()->with('success', 'insert success');
        } else {
            return redirect()->back()->with('fail', 'insert fail');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdatePatchRequest $request, Product $product)
    {
        $validated = $request->validated();

        $image = time() . '-pdt' . '.' . $validated["image_file"]->extension();
        $request->file('image_file')->storeAs('products/', $image);

        $validated["image"] = $image;

        $product =  $product->update($validated);

        if ($product) {
            return redirect()->back()->with('success', 'insert success');
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success','done');
    }

    public function img($filpath){
        try {
            $path = "app/products/$filpath";
            return response()->file(storage_path($path));
        } catch (\Throwable $th) {
            return "error";
        }

    }
}
