@extends('admin.master')

@section('content')



<form action="{{route('assign-catalog')}}" method="POST" id="auction-form" enctype="multipart/form-data">
    @csrf


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mt-5 border p-5">
        <h2 class="text-center">Assign Product to Catalog</h2>
        <div class="row">
            <div class="mb-3">

            </div>

            <div class="form-group col-md-6">
                <select class="form-select" name="catalog_id" aria-label="Default select example">
                    @foreach($catalog as $catalogs)
                    <option value="{{$catalogs->catalog_id}}">{{$catalogs->catalog_title}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group col-md-6">
                <select class="form-select" name="product_id" aria-label="Default select example">
                    @foreach($products as $product)
                    <option value="{{$product->lot_number}}">{{$product->product_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success ">Assign</button>
</form>
</div>
</div>
</div>

@endsection