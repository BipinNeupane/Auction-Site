@extends('admin.master')

@section('content')


<h2 class="text-center">Product Information</h2>
<div class="main-content">
    <div class="auction-container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">Product Image:</h3>
                <br>
                <img class="item-image" src="{{asset('uploads/'.$products->image)}}" alt="Product Image">
            </div>
            <div class="col-md-6 item-details">
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
            </div>
        </div>

        <div class="col-md-4 bid-history">
            <h4>Bid History</h4>
            <div class="bid-history-item">User1 - $250.00</div>
            <div class="bid-history-item">User2 - $230.00</div>
            <!-- Display past bid history items -->
        </div>
    </div>
</div>
</div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
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

    function is_framed(value){
        return value == 1 ? "Yes" : "No";
    }

    console.log(fields[category]);

    extra_info.innerHTML = fields[category];


    // console.log(extra_info);
</script>
@endsection