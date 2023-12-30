<div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <a href="{{route('display-dashboard')}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline">Admin Dashboard</span>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li>
                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span>
                    </a>

                    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="{{route('display-products')}}" class="nav-link px-0">Manage</a>
                        </li>
                        <li class="w-100">
                            <a href="{{route('display-archived-products') }}" class="nav-link px-0">Archived</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Users</span>
                    </a>

                    <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="{{route('display-clients',['role' => 1])}}" class="nav-link px-0">Clients</a>
                        </li>
                        <li class="w-100">
                            <a href="{{route('display-clients',['role' => 0])}}" class="nav-link px-0">Buyers</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="bi bi-list-check"></i> <span class="ms-1 d-none d-sm-inline">Catalog</span>
                    </a>

                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="{{route('create-catalog')}}" class="nav-link px-0">Create</a>
                        </li>
                        <li class="w-100">
                            <a href="{{route('display-assign-catalog')}}" class="nav-link px-0">Assign</a>
                        </li>

                    </ul>
                </li>
                

             
            </ul>
            <hr>
            <div onclick="toggleDropdown()" class="dropdown pb-4">
            <i class="fa fa-sign-out" aria-hidden="true"></i>

                <a href="{{route('logout')}}"><span class="d-none d-sm-inline mx-1">Logout</span></a>
            </div>
        </div>
    </div>
    <script>



    </script>