<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('seller.productlist', [
            'products' => Product::where('toko_id', auth()->user()->id)->get()
        ]);
    }

    public function dashboard()
    {
        return view('seller.index');
    }

    public function orderlist()
    {
        return view('seller.orderlist', [
            'orders'=>Order::all()
        ]);
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
        $data = $request->all();
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|numeric',
        //     'image' => 'image|file|max:2048',
        // ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $fileName);

            $data['image'] = $fileName;
        }

        $data['toko_id'] = auth()->user()->id;
        $product = Product::create($data);
        if ($product) {
            session()->flash('success', 'Product berhasil ditambahkan!');
        } else {
            session()->flash('error', 'Product gagal ditambahkan!');
        }

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
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        return view('seller.editproduct', [
            'product' => $product,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name', $product->name);
        $product->price = $request->input('price', $product->price);
        $product->stock = $request->input('stock', $product->stock);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('images/' . $product->image);
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $fileName);

            $product->image = $fileName;
        }

        $product->save();

        if ($product) {
            session()->flash('success', 'Product berhasil diedit!');
        } else {
            session()->flash('error', 'Product gagal diedit!');
        }
        return redirect('/myshop/product-list')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        // @dd($product);
        // if ($product->image) {
        //     Storage::delete($product->image);
        // }

        $product->delete();
        return redirect()->back()->with('Succes delete');
    }
}
