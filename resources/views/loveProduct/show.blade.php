@extends('layout')
@section('title', $product['title'])
@section('content')


<section class="product-detail mt-5">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$product['image']) }}" class="img-fluid rounded-start" alt="{{ $product['title'] }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['title'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $product['category']}}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product['price'] }}</p>
                        <p class="card-text"><strong>Stock:</strong> {{ $product['stock'] }}</p>
                      
                        <button class="btn btn-outline-success mt-3">Add to Cart</button>
                   <form action="{{route('loveProduct.destroy',$product['id'])}}" method="post">
                    @csrf
                    
                    <button class="btn btn-outline-danger mt-3"  type="submit">delete💔</button>
                   </form>
                           
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
