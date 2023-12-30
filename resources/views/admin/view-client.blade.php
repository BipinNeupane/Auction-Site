@extends('admin.master')

@section('content')


<h2 class="text-center">Client Information</h2>
<div class="main-content">
    <div class="auction-container">
        <div class="row">
          
            <div class="col-md-6 item-details">
                <div class="item-title">Client Information</div>
                <p><strong>User ID:</strong> {{$client->id}}</p>
                <p><strong>Client Name:</strong> {{$client->name}}</p>
                <p><strong>Email:</strong> {{$client->email}} </p>
                
                
            </div>
        </div>

       
    </div>
</div>
</div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

 
@endsection