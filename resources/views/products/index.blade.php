@extends('layout')
@section('title', 'Products')
@section('content')
<section class="allProduct">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if ($products->isEmpty())
    <center><a href="{{route('home.index')}}">no products</a></center>
    @else
    <div class="container mt-5">
        <h1 class="mb-4">Products</h1>
        {{-- search --}}
        <form class="form-control d-flex mb-3" action="{{route('products.index')}}" method="get">
           
            <select class="form-select" name="category" id="category">
                @if (!empty($selectedCategory) && $selectedCategory!=='all')
                <option value="{{$selectedCategory}}" hidden>{{$selectedCategory}}</option>   
                @endif
                
                <option value="all">Category</option> 
                @foreach ($categories as $category )
                   <option value="{{ $category}}">{{$category}}</option> 
                @endforeach  
            </select>
            {{-- search price --}}
            <select class="form-select" name="price" id="price">
                @if (!empty($selectedPrice ) && $selectedPrice!=='all')
                    <option value="{{$selectedPrice}}" hidden>{{$selectedPrice}}</option> 
                @endif
                <option value="all">price</option> 
                @foreach ($prices as $price )
                   <option value="{{ $price}}">{{$price}}</option> 
                @endforeach  
            </select>
            {{-- search stock --}}
            <select class="form-select" name="stock" id="stock">
                @if (!empty($selectedStock) && $selectedStock!='all' )
                    <option value="{{$selectedStock}}" hidden>{{$selectedStock}}</option> 
                @endif
                <option value="all">stock</option> 
                @foreach ($stock as $stock )
                   <option value="{{ $stock}}">{{$stock}}</option> 
                @endforeach  
            </select>
            <button class="btn btn-outline" type="submit">🔍</button>
        </form>
        {{-- end search --}}
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top " alt="{{ $product->title }}">
                        {{-- love --}}
                        <form class="love" action="{{route('loveProduct.store')}}" method="post">
                            @csrf
                            <input type="text" name="id" value="{{$product['id']}}" hidden readonly>
                            <button class=" btn btn-outline-success mt-3"  type="submit"> ❤️</button>
                           </form>
                           {{-- end love --}}
                        <div class="card-body">
                            <a href="{{ route('products.show', $product->id) }}" class="btn"><h5 class="card-title">{{ $product->title }}</h5></a>
                            
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $product->category }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                            <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                            <form action="{{route('cart.store')}}" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{$product->id}}" readonly hidden>
                                <input type="text" name="quantity" value="1" readonly hidden>
                                <button type="submit" class="btn btn-outline-success mt-3">Add to Cart</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
        @endif
</section>
@endsection
