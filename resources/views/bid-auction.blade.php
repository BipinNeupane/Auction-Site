@extends('master')

@section('content')

<h2 class="text-center">Bid Auction</h2>

<div class="container auction-container">
  <div class="row">
    <div class="col-md-6">
      <img class="item-image" src="{{asset('uploads/1703338636.png')}}" alt="Product Image">
    </div>
    <div class="col-md-6 item-details">
      <div class="item-title">Auction Item Title</div>
      <div class="bid-price">Starting Price: $200.00</div>
      <div class="container-sm information-container">
        <h3 class="text-center">Price Calculator</h3>
        <hr>
        <div class="item-title">Bidding will start on: </div>
        <div class="item-title">Ends in: </div>
        <div class="item-title">Commission (8%) </div>
        <input type="number" class="bid-input" min="1" step="5" placeholder="Enter your bid">
      <button class="bid-button">Place Bid</button>
      <div class="item-title">Total will be: </div>
    </div>
      
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-6 info-column">
      <h4>Product Information</h4>
      <p><strong>Artist:</strong> John Doe</p>
      <p><strong>Year Produced:</strong> 2022</p>
      <!-- Add more product information as needed -->
    </div>
    <div class="col-md-6 bid-history">
      <h4>Bid History</h4>
      <hr>
      <div class="bid-history-item">User1 - $250.00</div>
      <div class="bid-history-item">User2 - $230.00</div>
      <div class="bid-history-item">User2 - $230.00</div>
      <div class="bid-history-item">User2 - $230.00</div>
      <!-- Display past bid history items -->
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@endsection
