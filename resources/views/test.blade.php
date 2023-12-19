<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Multi-Step Form</title>
  <style>
    .step {
      display: none;
    }

    .step.active {
      display: block;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form id="multiStepForm">
        <!-- Step 1 -->
        <div class="step active" id="step1">
          <h2>Step 1</h2>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <button type="button" class="btn btn-primary next">Next</button>
        </div>

        <!-- Step 2 -->
        <div class="step" id="step2">
          <h2>Step 2</h2>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <button type="button" class="btn btn-secondary prev">Previous</button>
          <button type="button" class="btn btn-primary next">Next</button>
        </div>

        <!-- Step 3 -->
        <div class="step" id="step3">
          <h2>Step 3</h2>
          <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" rows="3" required></textarea>
          </div>
          <button type="button" class="btn btn-secondary prev">Previous</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    var currentStep = 1;

    $(".next").click(function () {
      $("#step" + currentStep).removeClass("active");
      currentStep++;
      $("#step" + currentStep).addClass("active");
    });

    $(".prev").click(function () {
      $("#step" + currentStep).removeClass("active");
      currentStep--;
      $("#step" + currentStep).addClass("active");
    });
  });
</script>

</body>
</html>
