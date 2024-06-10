@extends('layout')

@section('title', 'Loved Products')

@section('content')
<section class="loved-products mt-5">
    <div class="container">
        <h1 class="mb-4">Loved Products</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($products->isEmpty())
            <p>No products in your love list.</p>
        @else
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                            <div class="card-body">
                                <a href="{{route('loveProduct.show',$product->id)}}">  <h5 class="card-title">{{ $product->title }}</h5></a>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text"><strong>Category:</strong> {{ $product->category }}</p>
                                <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                                <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                                <form action="{{ route('loveProduct.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">💔</button>
                                </form>
                                <button type="" class="btn btn-outline-primary">add to cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
