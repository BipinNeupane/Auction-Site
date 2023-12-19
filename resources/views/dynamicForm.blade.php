<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-w8G+0FN+nbGNHXpV9xgWoqc9g8lRrJ8W3HRXnWSuL2+0jt7zpkOfiDM4PPLxj7xj" crossorigin="anonymous">
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
    }

    #sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #343a40;
      color: #fff;
      padding-top: 15px;
    }

    #sidebar .nav-link {
      color: #fff;
    }

    #content {
      margin-left: 250px;
      padding: 16px;
    }

    #sidebarToggle {
      background-color: #343a40;
      border: none;
      color: #fff;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      #sidebar {
        margin-left: -250px;
      }

      #sidebar a {
        display: block;
        text-align: left;
      }

      #content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

<div class="d-flex">

  <!-- Sidebar -->
  <div class="bg-dark text-white" id="sidebar">
    <div class="text-center mb-4">
      <h2>Admin</h2>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="#">Create Auction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Manage Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Logout</a>
      </li>
      <!-- Add more options as needed -->
    </ul>
  </div>

  <!-- Page Content -->
  <div id="content">
    <button class="btn btn-dark" id="sidebarToggle">☰</button>
    <!-- Add your content here -->
    <h2 class="mb-4">Welcome to the Admin Dashboard</h2>
  </div>

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-2sUlkfO6TqFqekE0WO3Uz2DxX48WQDR1rHqDzwhDD6RQwyA4/tB48l5gRVHDIlj5" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-EHlYeNAPwDJLqKiLeQ9A6o2P6o/GOW6+oe89XeDzOv5miT09p8ePb/J4MZ7xbofN" crossorigin="anonymous"></script>

<!-- Toggle sidebar script -->
<script>
  document.getElementById("sidebarToggle").addEventListener("click", function() {
    document.getElementById("sidebar").classList.toggle("active");
  });
</script>

</body>
</html>
