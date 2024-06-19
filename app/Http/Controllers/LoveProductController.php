<?php

namespace App\Http\Controllers;

use App\Models\LoveProduct;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Controllers\myFunctionController;
class LoveProductController extends Controller
{

    protected $myFunction;
    public function __construct(myFunctionController $myFunctionController)
    {
        $this->myFunction=$myFunctionController;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loveProduct.index', ['products' => LoveProduct::all()]);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $macAddress = $this->myFunction->getMacAddress();
        $product = Item::findOrFail($request->input('id'));

        $existingLoveProduct = LoveProduct::where('mac', $macAddress)->where('id', $product->id)
        ->where('title', $product->title)->where('price', $product->price)->where('stock', $product->stock)->where('category', $product->category)->where('description', $product->description)
        ->first();

        if (!$existingLoveProduct) {
            $loveProduct = new LoveProduct();
            $loveProduct->id = $product['id'];
            $loveProduct->image = $product['image'];
            $loveProduct->title = $product['title'];
            $loveProduct->description = $product['description'];
            $loveProduct->category = $product['category'];
            $loveProduct->price = $product['price'];
            $loveProduct->stock = $product['stock'];
            $loveProduct->mac = $macAddress;
            $loveProduct->save();
            return redirect()->route('loveProduct.index')->with('success', 'Product added to love list successfully.');
        }
        return redirect()->route('products.index')->with('error', 'Product is already in your love list.');
    }

    /**
     * Display the specified resource.
     */
    public function show($loveProduct)
    {
        $product=Item::findOrFail($loveProduct);
        return view('loveProduct.show',['product'=>$product]);
    }

 


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product=LoveProduct::findOrFail($id);
        $product->delete();
        return redirect()->route('loveProduct.index')->with('success', 'Product delete from love list successfully.');
    }
}
