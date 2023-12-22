@extends('admin.master')

@section('content')
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Lot no.</th>
      <th scope="col">Product Name</th>
      <th scope="col">Artist</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Start date</th>
      <th scope="col">End Date</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Archive</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($products as $product)
      <th scope="row">{{$product->lot_number}}</th>
      <td>{{$product->product_name}}</td>
      <td>{{$product->artist}}</td>
      <td>{{$product->category->category;}}</td>
      <td>${{$product->estimated_price;}}</td>
      <td>{{$product->start_date}}</td>
      <td>{{$product->end_date;}}</td>
      <td><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></td>
      <td><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></td>
      <td><button type="button" class="btn btn-outline-info btn-sm">Archive</button></td>
    </tr>
    @endforeach

   
   
  </tbody>
</table>
<?php
    // print_r($products)    
?>
@endsection