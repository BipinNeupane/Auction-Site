@extends('admin.master')

@section('content')
<h3 class="text-center">Archived Products</h3>
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
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col">Unarchive</th>
        </tr>
    </thead>
    <tbody>
    @foreach($archivedProducts as $product)
        <tr>
            <th scope="row">{{$product->lot_number}}</th>
            <td>{{$product->product_name}}</td>
            <td>{{$product->artist}}</td>
            <td>{{$product->category->category;}}</td>
            <td>${{$product->estimated_price;}}</td>
            <td>{{$product->start_date}}</td>
            <td>{{$product->end_date;}}</td>
            <td><a href="#"><button type="button" class="btn btn-outline-info btn-sm">View</button></a></td>
            <td><a href="{{route('display-edit-product',['lot_number' => $product->lot_number])}}"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a></td>
            <td><button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$product->lot_number}}">Delete</button></td>
            <td><button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#unarchiveModal{{$product->lot_number}}">Unarchive</button></td>
        </tr>
  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal{{$product->lot_number}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{$product->lot_number}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{$product->lot_number}}">Delete Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the product "{{$product->product_name}}"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="{{ route('destroy-product',['lot_number' => $product->lot_number]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="unarchiveModal{{$product->lot_number}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="unarchiveModalLabel{{$product->lot_number}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="unarchiveModalLabel{{$product->lot_number}}">Unarchive Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to unarchive the product "{{$product->product_name}}"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="{{ route('unarchive-product',['lot_number' => $product->lot_number]) }}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>


<?php
// print_r($products)    
?>
@endsection