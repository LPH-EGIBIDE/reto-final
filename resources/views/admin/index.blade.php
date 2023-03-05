@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection
@section('content')

    <div class="row w-100 d-flex justify-content-center ">
        <div class="card col-5 my-3">
            <div class="card-header d-flex align-items-center mt-2 ">
                <span class="card-title text-primary m-0 fs-2 fw-bold">Ficha de administrador</span>
            </div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <ul class="list-group list-group-flush text-break">
                                            <li class="list-group-item">Nombre: </li>
                                            <li class="list-group-item">DNI: </li>
                                            <li class="list-group-item">Email: </li>
                                            <li class="list-group-item">Teléfono: </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-5 my-4"  >
            <canvas
                    data-mdb-chart="bar"
                    data-mdb-dataset-label="Traffic"
                    data-mdb-labels="['Monday', 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday' , 'Saturday' , 'Sunday ']"
                    data-mdb-dataset-data="[2112, 2343, 2545, 3423, 2365, 1985, 987]"
            ></canvas>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')

@endsection