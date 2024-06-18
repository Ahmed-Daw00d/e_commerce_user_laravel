@extends('layout')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <h1 class="my-4">Cart</h1>
    @if($products->isEmpty())
        <p>No products in the cart.</p>
    @else
        @foreach($products as $product)
        <div class="cart-container">
            <div class="cart-item">
                <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="product-image">
                <div class="product-details">
                    <a href="{{route('cart.show',$product['id'])}}"> <h2 class="product-title">{{ $product->title }}</h2></a>
                    <p class="product-description">{{ $product->description }}</p>
                    <p class="product-price">${{ $product->price }}</p>
                    <p class="product-quantity">
                        Quantity:
                        <a class="btn btn-success" href="{{ route('cart.edit', ['id' => $product->id, 'operation' => 'increment']) }}">+</a>
                         {{ $product->quantity }}
                        <a class="btn btn-warning" href="{{ route('cart.edit', ['id' => $product->id, 'operation' => 'decrement']) }}">-</a>
                    </p>
                </div>
                <form action="{{ route('cart.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove</button>
            </form>
            </div>
            
        </div>
        @endforeach
    @endif
</div>
@endsection
