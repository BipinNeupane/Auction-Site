@extends('admin.master')

@section('content')




@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1 class="text-center">Welcome to admin dashboard</h1>

@endsection