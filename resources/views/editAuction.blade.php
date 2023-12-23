@extends('admin.master')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{route('edit-product',['lot_number' => $products->lot_number])}}" method="POST" id="auction-form" enctype="multipart/form-data">
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
    <h2 class="text-center">Edit Auction</h2>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="itemName">Item Name:</label>
        <input type="text" class="form-control" name="product_name" id="itemName" value="{{$products->product_name}}" placeholder="Enter item name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="category">Category:</label>
        <select class="form-select" aria-label="Default select example" name="category" id="category">
          @foreach (app('App\Http\Controllers\CategoryController')->index() as $category)
          <option value="{{ $category->category_id }}" {{ $category->category_id == $products->category_id ? 'selected' : '' }}>
            {{ $category->category }}
          </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="artist">Artist Name:</label>
        <input type="text" class="form-control" name="artist" id="artist" value="{{$products->artist}}" placeholder="Enter artist name" required>
      </div>

      <div class="form-group col-md-6">
        <label for="itemName">Subject Classification:</label>
        <input type="text" class="form-control" name="subject_classification" id="subject_classification" value="{{$products->subject_classification}}" placeholder="Subject Classification" required>
      </div>
      <div class="form-group col-md-6">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter item description" required>{{$products->description}}</textarea>
      </div>


      <div id="dynamic-fields-container"></div>

      <div class="mb-3 col-md-6">
        <label for="">Upload Image</label>
        <input type="file" name="image" class="course form-control">
      </div>

      @if ($products->image)
      <div class="mb-3 col-md-6">
        <label for="">Current Image</label>
        <img src="{{ asset('uploads/' . $products->image) }}" alt="Current Image" class="img-thumbnail">
      </div>
      @endif

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="startDate">Year Produced:</label>
          <input type="date" class="form-control" name="year_produced" id="year_produced" value="{{$products->year_produced}}" required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="startDate">Start Date:</label>
            <input type="datetime-local" class="form-control" name="startDate" value="{{$products->start_date}}" id="startDate" required>
          </div>
          <div class="form-group col-md-6">
            <label for="endDate">End Date:</label>
            <input type="datetime-local" class="form-control" name="endDate" value="{{$products->end_date}}" id="endDate" required>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="startingBid">Starting Bid:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input type="number" class="form-control" name="estimated_price" value="{{$products->estimated_price}}" id="startingBid" placeholder="Enter starting bid" step="0.01" required>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-sm">Save changes</button>
</form>
</div>
</div>
</div>




<!-- Your script -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    // Function to update dynamic fields based on the selected category
    function updateDynamicFields(category) {
      // Clear previous dynamic fields
      $('#dynamic-fields-container').empty();

      // Add dynamic fields based on the selected category
      switch (category) {
        case '1':
          $('#dynamic-fields-container').append(`
        <div class="form-group col-md-10">
          <label for="material_used">Drawing Medium:</label>
          <input type="text" class="form-control" name="material_used" id="material_used" value="{{$products->material_used}}" placeholder="Enter Drawing Medium" required>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="is_framed" value="1" id="isFramed" {{ $products->is_framed ? 'checked' : '' }}>
          <label class="form-check-label" for="isFramed">
            Framed
          </label>
        </div>

        <div class="form-group col-md-6">
          <label for="dimensions_height">Height:</label>
          <input type="number" class="form-control" value="{{floatval($products->height)}}" name="height" id="height">
        </div>

        <div class="form-group col-md-6">
          <label for="dimensions_length">Length:</label>
          <input type="number" class="form-control" name="length" value="{{floatval($products->length)}}" id="dimensions_length" step="1">
        </div>

                    `);
          break;


        case '2':
          $('#dynamic-fields-container').append(`
                    <div class="form-group col-md-10">
                <label for="material_used">Painting Medium:</label>
                <input type="text" class="form-control" name="material_used" id="material_used" value="{{$products->material_used}}" placeholder="Enter Painting Medium" required>
            </div>

            <div class="form-check">
    <input class="form-check-input" type="checkbox" name="is_framed" value="1" id="isFramed" {{ $products->is_framed ? 'checked' : '' }}>
    <label class="form-check-label" for="isFramed">
        Framed
    </label>
</div>

        <div class="form-group col-md-6">
                    <label for="height">Height:</label>
                    <input type="number" class="form-control" value="{{floatval($products->height)}}" name="height" id="height">
                </div>

                <div class="form-group col-md-6">
                    <label for="length">Length:</label>
                    <input type="number" class="form-control" name="length" value="{{floatval($products->length)}}" id="length" step="1">
                </div>
                    `);
          break;

        case '3':
          $('#dynamic-fields-container').append(`
          <div class="form-group col-md-10">
    <label for="photo_type">Type of Photograph:</label>
    <select class="form-select" aria-label="Default select example" name="type" id="photo_type">
        <option value="Black and White" {{ $products->type == 'Black and White' ? 'selected' : '' }}>
            Black and White
        </option>
        <option value="Color" {{ $products->type == 'Color' ? 'selected' : '' }}>
            Color
        </option>
    </select>
</div>
        <div class="form-group col-md-6">
                    <label for="height">Height:</label>
                    <input type="number" class="form-control" value="{{floatval($products->height)}}" name="height" id="height">
                </div>

                <div class="form-group col-md-6">
                    <label for="length">Length:</label>
                    <input type="number" class="form-control" name="length" value="{{floatval($products->length)}}" id="length" step="1">
                </div>
                    `);
          break;
          // Add cases for other categories

        case '4':
          $('#dynamic-fields-container').append(`
                    <div class="form-group col-md-6">
                <label for="material_used">Materials Used:</label>
                <input type="text" class="form-control" name="material_used" id="material_used" value="{{$products->material_used}}" placeholder="Enter Sculpture Medium" required>
            </div>
        <div class="form-group col-md-6">
                    <label for="height">Height:</label>
                    <input type="number" class="form-control" name="height" value="{{floatval($products->height)}}" id="height">
                </div>

                <div class="form-group col-md-6">
                    <label for="length">Length:</label>
                    <input type="number" class="form-control" name="length" vvalue="{{floatval($products->length)}}" id="length" step="1">
                </div>

                <div class="form-group col-md-6">
                    <label for="width">Width:</label>
                    <input type="number" class="form-control" name="width" value="{{floatval($products->width)}}" id="width" step="1">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="weight">Weight (in Kg):</label>
                    <input type="number" class="form-control" name="weight" value="{{floatval($products->weight)}}" id="weight" step="1">
                </div>
                
                    `);
          break;

        case '5':
          $('#dynamic-fields-container').append(`
                    <div class="form-group col-md-6">
                <label for="material_used">Materials Used:</label>
                <input type="text" class="form-control" name="material_used" value="{{$products->material_used}}" id="material_used" placeholder="Enter Painting Medium" required>
            </div>
        <div class="form-group col-md-6">
                    <label for="height">Height:</label>
                    <input type="number" class="form-control" value="{{floatval($products->height)}}" name="height" id="height">
                </div>

                <div class="form-group col-md-6">
                    <label for="length">Length:</label>
                    <input type="number" class="form-control" value="{{floatval($products->length)}}" name="length" id="length" step="1">
                </div>

                <div class="form-group col-md-6">
                    <label for="width">Width:</label>
                    <input type="number" class="form-control" name="width" value="{{floatval($products->width)}}" id="width" step="1">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="weight">Weight (in Kg):</label>
                    <input type="number" class="form-control" name="weight" value="{{floatval($products->weight)}}" id="weight" step="1">
                </div>
                
                    `);
          break;

        default:
          // Handle unknown category
          break;
      }
    }

    // Event listener for category change
    $('#category').on('change', function() {
      var selectedCategory = $(this).val();
      updateDynamicFields(selectedCategory);
    });

    // Initial call to set up dynamic fields based on default category
    var initialCategory = $('#category').val();
    updateDynamicFields(initialCategory);
  });
</script>
@endsection