@extends('master')
@section('title', 'Home')

@section('content')
<h1 class="text-center">Top Products</h1>
<br>
<div class="container">
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="Product Image" style="height: 250px; width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection