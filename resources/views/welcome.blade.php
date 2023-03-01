@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')

    <div class="p-5 text-center bg-image" style="background-image: url('https://www.bdpcenter.com/wp-content/uploads/2022/02/hosteleria-8.jpg?x18539'); height: 400px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h2 class="mb-5">Tienda online de la escuela de hosteleria de Egibide</h2>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection