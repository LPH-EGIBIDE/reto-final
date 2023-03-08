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
            <h5 class="my-auto text-primary fs-4 d-none d-lg-block">Categorias</h5>
            <p class="my-auto fw-bold text-primary d-lg-none">Categorias</p>
            <div class="d-flex">
                <form action="{{route('admin.category.filter')}}" method="get" id="filterForm">
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
        <div class="card-body bg-light table-responsive">
            <table class="table text-capitalize">
                <thead class="text-primary">
                <tr>
                    <th scope="col" class="border-dark">Nombre</th>
                    <th scope="col" class="border-dark">Pagina Principal</th>
                    <th scope="col" class="border-dark">Acciones</th>
                </tr>
                </thead>
                <tbody id="itemTable">
                @for($i = 0; $i < 10; $i++)
                    <tr class="loading-skeleton">
                        <td><p>Primero</p></td>
                        <td><p>si</p></td>
                        <td><p>Hola mama</p></td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <p id="noItems" class="text-center d-none">No hay categorias</p>
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