<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Cart;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select()->orderBy('id','desc')->take(4)->get();
        return view('home',compact('products'));
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
    public function store(Request $request , $id)
    {
        $addToCart = Cart::create([
            "user_id"  => Auth::user()->id,
            "prd_id"   => $request->prd_id,
            "name"     => $request->name,
            "price"    => $request->price,
            "image"    => $request->image,
        ]);
        return redirect()->route("products.singleProduct",$id);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $relatedProduct = Product::where('type',$product->type)->where('id','!=',$id)->orderBy('id','desc')->get();
        return view("products.singleProduct", compact("product","relatedProduct"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
