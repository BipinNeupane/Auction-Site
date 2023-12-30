@extends('master')
@section('title', 'Search')

@section('content')

<div class="container border rounded shadow p-2">
    <h1 class="mb-4 text-center">Filter</h1>
    <form action="{{ route('filter-search') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <label for="artist">Artist:</label>
                <input type="text" name="artist" class="form-control" value="">
            </div>
            <div class="col-md-2">
                <label for="category">Category:</label>
                <select name="category" class="form-control">
                <option value="" selected disabled>Select Category</option>
                    @foreach (app('App\Http\Controllers\CategoryController')->index() as $category)
                    <option value="{{$category->category_id}}" >{{$category->category}}</option>
                @endforeach
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="col-md-2">
                <label for="price">Price:</label>
                <input type="text" name="price" class="form-control" value="">
            </div>
            <div class="col-md-2">
                <label for="auction_date">Auction Date:</label>
                <input type="date" name="auction_date" class="form-control" value="">
            </div>
            <div class="col-md-2">
                <label for="subject_classification">Subject Classification:</label>
                <input type="text" name="subject_classification" class="form-control" value="">
            </div>
            <div class="col-md-2">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>
</div>


<h1 class="text-center">Search Results: </h1>
<br>
<div class="container">
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
        @foreach($results as $product)
        <div class="col">
            <div class="card h-100 card-ca">
                <img src="{{ asset('uploads/' . $product->image) }}" class="card-img-top" alt="Product Image" style="height: 200px; width: 100%;">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text"><span>Estimated Price: </span>$<span class="estimated-price">{{ $product->estimated_price }}</span></p>
                    <div id="countdown-{{ $product->lot_number }}" class="countdown-timer"></div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('bid-auction',['lot_number' =>$product->lot_number])}}" class="btn btn-success bidnow-btn">Bid Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
       



<script>
  

       <?php
       foreach ($results as $product) {
       ?>
       initializeCountdown("countdown-<?php echo $product->lot_number; ?>", "<?php echo $product->end_date; ?>");
       <?php
       }
       ?>
    

    function initializeCountdown(elementId, endDate) {
        // Set the date we're counting down to
        var countDownDate = new Date(endDate).getTime();

        // Update the countdown every 1 second
        var x = setInterval(function() {
            // Get the current date and time
            var now = new Date().getTime();

            // Calculate the remaining time
            var distance = countDownDate - now;

            // Calculate days, hours, minutes, and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown
            document.getElementById(elementId).innerHTML ="Ends In:" + " " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(elementId).innerHTML = "EXPIRED";
            }
        }, 1000);
    }

</script>


@endsection