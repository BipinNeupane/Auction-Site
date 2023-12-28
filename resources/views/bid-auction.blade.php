@extends('master')

@section('content')

<h2 class="text-center">Bid Auction</h2>
<form action="{{route('post-auction',['lot_number' => $products->lot_number])}}" method="POST">
  @csrf
<div class="container auction-container">
    <div class="row">
        <div class="col-md-6">
            <img class="item-image" src="{{asset('uploads/'.$products->image)}}" alt="Product Image">
        </div>
        <div class="col-md-6 item-details">
            <div class="item-title">{{$products->product_name}}</div>
            <div class="container-sm information-container">
                <h3 class="text-center">Bid Now!</h3>
                <hr>
                <div class="bid-price">Starting Price: ${{$products->estimated_price}}</div>
                <div id="countdown"> </div>
                <div class="item-info">Highest Bid: ${{ is_object($highestBid) ? $highestBid->bid_amount : $highestBid }} </div>
                <input type="number" class="bid-input" step="0.01" id="bid-input" name="bid_amount" min=@php echo $products->estimated_price @endphp placeholder="Enter your bid">
                <button class="bid-button">Place Bid</button>
                <div class="item-info" id="commission">Comission: </div>
                <div class="item-info" id="advanced-bid"></div>
                <div class="item-info" id="total">Total will be: </div>
            </div>

        </div>
    </div>
    </form>
    <br>
    <div class="row">
        <div class="col-md-6 info-column">

            <div class="item-title">Product Information</div>
            <p><strong>Lot Number:</strong> {{$products->lot_number}}</p>
            <p><strong>Product Name:</strong> {{$products->product_name}}</p>
            <p><strong>Artist:</strong> {{$products->artist}} </p>
            <p><strong>Description:</strong> {{$products->description}} </p>
            <p><strong>Category:</strong> {{$products->category->category}}</p>
            <p><strong>Subject Classification:</strong> {{$products->subject_classification}}</p>
            <div id="extra-information"></div>
            <p><strong>Year Produced:</strong> {{$products->year_produced}}</p>
            <p><strong>Start Date:</strong> {{$products->start_date}}</p>
            <p><strong>End Date:</strong> {{$products->end_date}}</p>
            <p><strong>Starting Price:</strong> ${{$products->estimated_price}}</p>
            <!-- Add more product information as needed -->
        </div>
        <div class="col-md-6 bid-history">
            <h4>Bid History</h4>
            <hr>
            <!-- Display past bid history items -->
            @foreach($bids as $bid)
            <div class="bid-history-item">User1 - ${{$bid->bid_amount}}</div>
            @endforeach
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<script>
    const start_date = <?php echo json_encode($products->start_date); ?>;
    const end_date = <?php echo json_encode($products->end_date); ?>;


    currentTime = new Date().getTime();
    startCountDate = new Date(start_date).getTime();
    endCountDate = new Date(end_date).getTime();

    if (startCountDate > currentTime) {
        initializeCountdown('countdown', start_date, 'Bidding will start In:');
        // changing the color
        $('#countdown').addClass('item-info countdown-green');
        updateTotal(true); // Pass true to indicate the start date condition
    } else {
        initializeCountdown('countdown', end_date, 'Ends In:');
        $('#countdown').addClass('item-info countdown-red');
        updateTotal(false); // Pass false for other cases
    }

    function updateTotal(isStartDate) {
    document.getElementById('bid-input').addEventListener('input', function() {
        var bidInputValue = parseFloat(this.value) || 0; // Convert input value to a float or default to 0
        var commission = 0.08; // 8% commission
        var advanceBidFee = 10; // Advance bid fee

        if (isStartDate) {
            // Add advance bid fee when the start date condition is true
            bidInputValue += advanceBidFee;
            document.getElementById('advanced-bid').textContent = "Advanced Bid Fee: $" + advanceBidFee.toFixed(2);
        }

        var comission = bidInputValue * commission;
        var total = bidInputValue + comission; // Calculate total without multiplying by bidInputValue

        
        document.getElementById('commission').textContent = "Commission (8%): $" + comission.toFixed(2);
        document.getElementById('total').textContent = "Total: $" + total.toFixed(2); // Display the total with 2 decimal places
    });
}

    function initializeCountdown(elementId, date, action) {
        // Set the date we're counting down to
        var countDownDate = new Date(date).getTime();

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
            document.getElementById(elementId).innerHTML = action + " " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(elementId).innerHTML = "EXPIRED";
            }
        }, 1000);
    }



    var extra_info = document.getElementById('extra-information');

    var category = <?php echo $products->category->category_id; ?>;
    console.log(category);

    const fields = {
        '1': `<p>
        <strong>Drawing Medium:</strong> {{$products->material_used}}
      </p>
      <p>
      <strong>Framed:</strong> ${is_framed(<?php echo $products->is_framed; ?>)}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
        '2': `<p>
        <strong>Painting Medium:</strong> {{$products->material_used}}
      </p>
      <p>
      <strong>Framed:</strong> ${is_framed(<?php echo $products->is_framed; ?>)}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
        '3': `<p>
        <strong>Photograph Type:</strong> {{$products->type}}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
        '4': `<p>
        <strong>Material Used:</strong> {{$products->material_used}}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      <p>
        <strong>Width:</strong> {{$products->width}} cm
      </p>
      <p>
        <strong>Weight:</strong> {{$products->weight}} cm
      </p>
      `,
        '5': `<p>
        <strong>Materials Used:</strong> {{$products->material_used}}
      </p>
      <p>
      <strong>Framed:</strong> ${is_framed(<?php echo $products->is_framed; ?>)}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
    };

    function is_framed(value) {
        return value == 1 ? "Yes" : "No";
    }

    console.log(fields[category]);

    extra_info.innerHTML = fields[category];
</script>

@endsection