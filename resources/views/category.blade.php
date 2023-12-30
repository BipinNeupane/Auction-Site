@extends('master')

@section('content')
<h1 class="text-center">Category: {{$category->category}}</h1>
<br>
<div class="container">
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
        @foreach($products as $product)
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
       foreach ($products as $product) {
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