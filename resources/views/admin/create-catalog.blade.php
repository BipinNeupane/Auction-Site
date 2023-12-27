@extends('admin.master')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{route('save-catalog')}}" method="POST" id="auction-form" enctype="multipart/form-data">
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
        <h2 class="text-center">Create Catalog</h2>
        <div class="row">
            <div class="mb-3">
                <label for="catalogTitle" class="form-label">Email address</label>
                <input type="text" class="form-control" id="catalogTitle" name="catalog_title" placeholder="Enter Catalog title" required>
            </div>

            <div class="form-group col-md-6">
                <label for="startDate">Start Date:</label>
                <input type="date" class="form-control" name="start_date" id="startDate" required>
            </div>
            <div class="form-group col-md-6">
                <label for="endDate">End Date:</label>
                <input type="date" class="form-control" name="end_date" id="endDate" required>
            </div>

        
            <button type="submit" class="btn btn-success ">Create</button>
                
                
</form>
</div>
</div>
</div>

@endsection