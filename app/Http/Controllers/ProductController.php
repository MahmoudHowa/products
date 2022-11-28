<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$product = product::all();  // unwanted method
        $products = Product::latest()->paginate(4);
        return view('product.index', compact('products'));
    }

    public function trashedProducts()
    {
        //$product = product::all();  // unwanted method
        // $products = Product::withTrashed()->latest()->paginate(4); // with  undeleted records
        $products = Product::onlyTrashed()->latest()->paginate(4); //  without undeleted records
        return view('product.trash', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);
        $product = Product::create($request->all());
        return redirect()->route('products.index')->with('success','product added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required'
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','product updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','product deleted sucessfully');
    }

    public function softDelete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')->with('success','product deleted sucessfully');
    }

    public function deleteForEver($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('product.trash')->with('success','product deleted sucessfully');
    }

    public function backFromSoftDelete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('products.index')->with('success','product Backed sucessfully');
    }


}

