<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class productsController extends Controller
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
        }
        else if (strpos($os, 'WIN') === false) {
            exec('ifconfig -a', $output);
            foreach ($output as $line) {
                if (preg_match('/([A-Fa-f0-9]{2}[:-]){5}([A-Fa-f0-9]{2})/', $line, $matches)) {
                    $macAddress = $matches[0];
                    break;
                }
            }
        }
        
         else {
         
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
        return view('products.index',["products"=>Item::all()]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    
        $mac = $this->getMacAddress();
        $product=Item::findOrFail($id);
        $productArray = $product->toArray();
        $productArray['mac'] = $mac;
      $index=['product'=>$productArray];
      return view('products.show',$index);
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
    public function destroy($id)
    {
        //
    }
}
