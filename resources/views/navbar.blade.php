<header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3 navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 d-none d-lg-block" href="{{route('home')}}">
                    <!-- Image Logo -->
                    <img src="{{Vite::asset('resources/images/logo_egibide.png')}}" height="42" alt="" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.index')}}">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.egibide.org/escuela-de-hosteleria/">Egibide</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
            <!-- Right elements -->
            <div class="d-flex align-items-center justify-content-end col">
                <!-- Icon -->
                @if(Auth::check())
                    @can('is-admin')
                        <a class="text-reset me-3" href="{{route('admin.admin')}}">
                            <i class="fa-solid fa-shield-halved fs-4"></i>
                        </a>
                    @endcan
                        <a class="text-reset me-3" href="{{route('cart.show')}}">
                            <i class="fas fa-shopping-cart fs-4"></i>
                            <span id="navbar-cart-count" class="badge rounded-pill badge-notification bg-primary">0</span>
                        </a>
                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell fs-4"></i>
                        <span  class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
                <!-- Avatar -->

                    <div class="dropdown">
                        <a class="drop down-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <!-- Avatar -->
                            <img src="{{"https://www.gravatar.com/avatar/" . md5( strtolower( trim( auth()->user()->email ) ) ) . "&s=300&time=".time()}}" class="rounded-circle" height="42" alt="" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="{{route('user.index')}}">Mi Perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>

                            </li>
                        </ul>
                    </div>

                @else
                    <a href="{{route('login')}}" class="btn btn-primary btn-sm">Login</a>
                @endif

            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

</header>
