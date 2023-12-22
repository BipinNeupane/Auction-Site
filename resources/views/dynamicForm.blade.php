<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4>Student Form</h4>
          </div>
          <div class="card-body">

            <form action="{{ route('save-student') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" required class="form-control">
              </div>
              <div class="mb-3">
                <label for="">Upload Image</label>
                <input type="file" name="image" required class="course form-control">
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

</body>

</html>