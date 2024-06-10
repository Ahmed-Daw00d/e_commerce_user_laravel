<?php

namespace App\Http\Controllers;

use App\Models\LoveProduct;
use Illuminate\Http\Request;
use App\Models\Item;

class LoveProductController extends Controller
{

    public function getMacAddress()
    {

        $os = PHP_OS;

        if (strpos($os, 'WIN') !== false) {
            exec('getmac', $output);
            foreach ($output as $line) {
                if (preg_match('/([A-Fa-f0-9]{2}[:-]){5}([A-Fa-f0-9]{2})/', $line, $matches)) {
                    $macAddress = $matches[0];
                    break;
                }
            }
        } else if (strpos($os, 'WIN') === false) {
            exec('ifconfig -a', $output);
            foreach ($output as $line) {
                if (preg_match('/([A-Fa-f0-9]{2}[:-]){5}([A-Fa-f0-9]{2})/', $line, $matches)) {
                    $macAddress = $matches[0];
                    break;
                }
            }
        } else {

            $output = [];
            exec('ifconfig -a', $output);
            $macAddress = isset($output[0]) ? $output[0] : 'MAC Address not found';
        }

        return  $macAddress;
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
        $macAddress = $this->getMacAddress();
        $product = Item::findOrFail($request->input('id'));

        $existingLoveProduct = LoveProduct::where('mac', $macAddress)
        ->where('title', $product->title)
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
        return redirect()->route('products.show', $request->input('id'))->with('error', 'Product is already in your love list.');
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
