@extends('admin.master')

@section('content')
<h3 class="text-center">All clients</h3>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client Name</th>
            <th scope="col">Email</th>
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$client->name}}</td>
            <td>{{$client->email}}</td>
            <td><a href="{{ route('view-client', ['id' => $client->id]) }}"><button type="button" class="btn btn-outline-info btn-sm">View</button></a></td>
            <td><a href="{{ route('display-edit-client', ['id' => $client->id]) }}"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a></td>
            <td><button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$client->id}}">Delete</button></td>
            
        </tr>



        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{$client->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{$client->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{$client->id}}">Delete client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the client "{{$client->name}}"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="{{route('destroy-user',['id' => $client->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
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
// print_r($clients)    
?>
@endsection