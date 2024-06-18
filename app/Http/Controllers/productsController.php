<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Controllers\myFunctionController;

class productsController extends Controller
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
        return view('products.index', ["products" => Item::all()]);
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

        $mac = $this->myFunction->getMacAddress();;
        $product = Item::findOrFail($id);
        $productArray = $product->toArray();
        $productArray['mac'] = $mac;
        $index = ['product' => $productArray];
        return view('products.show', $index);
    }
}
