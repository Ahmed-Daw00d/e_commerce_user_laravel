@extends('layout')
@section('title', 'Products')
@section('content')
<section class="allProduct">
    @if ($products->isEmpty())
    <p>no products</p>
    @else

    <div class="container mt-5">
        <h1 class="mb-4">Products</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        
                        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                        <form class="love" action="{{route('loveProduct.store')}}" method="post">
                            @csrf
                            <input type="text" name="id" value="{{$product['id']}}" hidden readonly>
                            <button class=" btn btn-outline-success mt-3" onclick="loveProduct({{ json_encode($product)}})" type="submit"> ❤️</button>
                           </form>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $product->category }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                            <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary">View Details</a>
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
