<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('seller.productlist', [
            'product' => Product::where('toko_id', auth()->user()->id)->get()
        ]);
    }

    public function shboard()
    {
        return view('seller.index');
    }

    public function orlist()
    {
        return view('seller.orderlist');
    }

    public function prlist()
    {
        // return view('seller.productlist', [
        //     'product' => Product::where('toko_id', auth()->user()->id)->get()
        // ]);
    }

    public function pradd()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['toko_id'] = auth()->user()->id;

        Product::create($validatedData);

        return redirect('/myshop/product-list')->with('success', 'Product added successfully!');
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
        return view('seller.editproduct', [
            'product' => $product,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        // @dd($product);
        // if ($product->image) {
        //     Storage::delete($product->image);
        // }

        $product->delete();
        return redirect()->back()->with('Succes delete');

        // Product::destroy($product->id);

        // return redirect('/myshop/product-list')->with('success', 'Product deleted successfully!');
    }
}
