<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Controllers\myFunctionController;

class CartController extends Controller
{
    protected $myFunction;
    public function __construct(myFunctionController $myFunctionController)
    {
        $this->myFunction = $myFunctionController;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mac = $this->myFunction->getMacAddress();
        $products = Cart::where('mac', $mac)->get();
        return view('cart.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mac = $this->myFunction->getMacAddress();
        $product = Item::findOrFail($request->input('id'));
        $index = new Cart();
        $existing = Cart::where('mac', $mac)->where('title', $product['title'])->where('price', $product['price'])->where('description', $product['description'])->where('stock', $product['stock'])->first();
        if (!$existing && $product['stock'] !='out stock') {
            $index->id = $product->id;
            $index->image = $product->image;
            $index->title = $product->title;
            $index->description = $product->description;
            $index->category = $product->category;
            $index->price = $product->price;
            $index->stock = $product->stock;
            $index->mac = $mac;
            $index->quantity = $request->input('quantity');
            $index->save();
            return redirect()->route('cart.index')->with('success', 'Product added to cart list successfully.');
        }
        else if($product['stock'] =='out stock'){
            return redirect()->route('products.index')->with('error', 'sorry This product is currently not available. We will provide it as soon as possible.');
        }
        else{
            $existing->quantity += $request->input('quantity');
            $existing->save();
            return redirect()->route('cart.index')->with('success', 'Product quantity updated in cart.');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show( $product)
    {
        
       
        return redirect()->route('products.show',$product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $operation)
    {
        $product = Cart::find($id);

        if ($product) {
            if ($operation === 'increment') {
                $product->increment('quantity');
                $message = 'Product quantity increased.';
            } elseif ($operation === 'decrement' && $product->quantity > 1) {
                $product->decrement('quantity');
                $message = 'Product quantity decreased.';
            } else {
                return redirect()->route('cart.index')->with('error', 'Cannot decrement quantity below 1.');
            }
            $product->save();
        } else {
            return redirect()->route('cart.index')->with('error', 'Product not found.');
        }

        return redirect()->route('cart.index')->with('success', $message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mac=$this->myFunction->getMacAddress();
        $product=Cart::where('mac',$mac)->where('id',$id)->first();
        $product->delete();
        return redirect()->route('cart.index')->with('success','product deleted from cart');
    }
}
