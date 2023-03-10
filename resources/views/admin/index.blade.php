@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection
@section('content')

    <div class="row mb-4 justify-content-evenly">
            <div class="card col-12 col-md-5 my-3">
                <div class="card-header d-flex align-items-center mt-2 ">
                    <span class="card-title text-primary m-0 fs-2 fw-bold">Ficha de administrador</span>
                </div>
                <div class="card-body">
                    <div>
                            <div class="col table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <ul class="list-group list-group-flush text-break">
                                                <li class="list-group-item">Nombre: {{auth()->user()->name}} </li>
                                                <li class="list-group-item">Email: {{auth()->user()->email}} </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-5 my-3">
                <div class="card-header d-flex align-items-center mt-2 ">
                    <span class="card-title text-primary m-0 fs-2 fw-bold">Pedidos Semanales</span>
                </div>
                <div class="card-body my-3">
                    <canvas
                            data-mdb-chart="bar"
                            data-mdb-dataset-label="Pedidos"
                            data-mdb-labels="['Lunes', 'Martes' , 'Miercoles' , 'Jueves' , 'Viernes' , 'Sabado' , 'Domingo ']"
                            data-mdb-dataset-data="[0, 10, 20, 30, 30, 60, 100]"
                    ></canvas>
                </div>
            </div>
    </div>
@endsection

@section('footer')
    @include('footer')

@endsection