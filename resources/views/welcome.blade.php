@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div class="row">
        <div class="p-5 text-center bg-image col-12"
             style="background-image: url('https://www.bdpcenter.com/wp-content/uploads/2022/02/hosteleria-8.jpg?x18539'); height: 350px;">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h2 class="mb-5 display-1 fs-1">Escuela de hosteleria - Egibide</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <h4>Categorias</h4>
        <hr>
        <div class="col-12 col-md-10 offset-md-1">
            <div class="row">
                @for($i=0; $i < 6; $i++)
                    @include('categories.tile')
                @endfor
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <h4>Productos Destacados</h4>
        <hr>
        <div class="col">
            <div class="row">
                @for($i=0; $i < 2; $i++)
                    @include('products.tile')
                @endfor
            </div>

        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection

