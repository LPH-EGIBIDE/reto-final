<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{route('home')}}">Alex Subnormal</a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse col-4" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.admin')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        Productos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('admin.product.create')}}">Crear</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.product.adminIndex')}}">Lista</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('admin.category.create')}}">Crear</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.category.adminIndex')}}">Lista</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        Descuentos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('admin.discount.create')}}">Crear</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.discount.adminIndex')}}">Lista</a></li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.order.adminIndex')}}">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.users.adminIndex')}}">Usuarios</a>
                </li>
            </ul>
            <!-- Left links -->
            <div class="d-flex align-items-center">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                <button class="btn btn-danger" type="submit">
                    <i class="fa-solid fa-right-from-bracket text-light"></i>
                </button>
                </form>
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->