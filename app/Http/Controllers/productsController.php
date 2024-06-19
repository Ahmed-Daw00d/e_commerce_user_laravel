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
    public function index(Request $request)
{
    $categories = $this->getColumFromDb(Item::class, 'category');
    $prices = $this->getColumFromDb(Item::class, 'price');
    $stock = $this->getColumFromDb(Item::class, 'stock');
    
    $selectedCategory = strip_tags($request->input('category'));
    $selectedPrice = strip_tags($request->input('price'));
    $selectedStock = strip_tags($request->input('stock'));

    $query = Item::query();

    if ($selectedCategory && $selectedCategory != 'all') {
        $query->where('category', $selectedCategory);
    }

    if ($selectedPrice && $selectedPrice != 'all') {
        $query->where('price', $selectedPrice);
    }

    if ($selectedStock && $selectedStock != 'all') {
        $query->where('stock', $selectedStock);
    }

    $products = $query->get();

    return view('products.index', [
        'products' => $products,
        'categories' => $categories,
        'prices' => $prices,
        'stock' => $stock,
        'selectedCategory' => $selectedCategory,
        'selectedPrice' => $selectedPrice,
        'selectedStock' => $selectedStock,
    ]);
}


     function getColumFromDb( $Model,string $nameColum){
        return $Model::pluck($nameColum)->unique();
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
