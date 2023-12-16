<!-- Example Code -->
<nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid">
    <a class="navbar-brand  justify-content-center" href="#">
      <h1 class="font-bebas-neue">Fotheby's <br></h1>
      <h6>Auction House</h6>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            @foreach (app('App\Http\Controllers\CategoryController')->index() as $category)
            <li><a class="dropdown-item" href="#">{{ $category->category }}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>

      </ul>
      <form class="d-flex" role="search" data-dashlane-rid="3c2f471a76196ce7" data-form-type="">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" data-dashlane-rid="f33a2ff734bbc4b4" data-form-type="">
        <button class="btn btn-outline-primary" type="submit" data-dashlane-rid="7aae0f4899be1c1e" data-form-type="" data-dashlane-label="true">Search</button>
      </form>

    </div>
  </div>
</nav>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active " data-bs-interval="3000">
      <img src="painting.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:white; font-family: 'Bebas Neue', sans-serif;">Paitings</h1>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="carving.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:white; font-family: 'Bebas Neue', sans-serif;">Carvings</h1>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="sculpture.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:white; font-family: 'Bebas Neue', sans-serif;">Sculpture</h1>

      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>