@extends('layouts.app')

@section('scripts')
    @vite('resources/js/filterElement.ts')
@endsection

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <div class="card my-3">
        <div class="card-header d-flex align-items-center justify-content-between p-3">
            <h5 class="my-auto text-primary fs-4 d-none d-lg-block">Pedidos</h5>
            <p class="my-auto fw-bold text-primary d-lg-none">Pedidos</p>
            <div class="d-flex">
                <form action="{{route('admin.order.filter')}}" method="get" id="filterForm">
                    @csrf
                    <input type="hidden" name="page" id="pageForm" value="1">
                    <div class="input-group ml-auto w-auto">
                        <div class="form-outline">
                            <input type="search" id="form1" name="filtro" class="form-control"
                                   placeholder="Buscar"/>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body bg-light table-responsive text-capitalize">
            <table class="table">
                <thead class="text-primary">
                <tr>
                    <th scope="col" class="border-dark">Usuario</th>
                    <th scope="col" class="border-dark">Codigo de descuento</th>
                    <th scope="col" class="border-dark">Subtotal</th>
                    <th scope="col" class="border-dark">Total</th>
                    <th scope="col" class="border-dark">Estado</th>
                    <th scope="col" class="border-dark">Acciones</th>
                </tr>
                </thead>
                <tbody id="itemTable">
                @for($i = 0; $i < 10; $i++)
                    <tr class="loading-skeleton">
                        <td><p>Alex</p></td>
                        <td><p>WELCOME</p></td>
                        <td><p>100€</p></td>
                        <td><p>75€</p></td>
                        <td><p>Recibido</p></td>
                        <td><p>Hola mama</p></td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <p id="noItems" class="text-center d-none">No hay pedidos</p>
        </div>
        <div class="card-footer">
            <nav>
                <ul class="pagination justify-content-end my-auto">
                    <li class="page-item">
                        <a class="page-link" id="previousPage" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link disabled" disabled id="page"
                                             href="#">1</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" id="nextPage" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@endsection
@section('footer')
    @include('footer')

@endsection