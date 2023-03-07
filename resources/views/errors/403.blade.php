@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection
@section('content')
    <div class="row d-flex justify-content-center  text-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger fs-1">{{ __('Error 403') }}</div>

                <div class="card-body fs-4">
                    {{ __('No tienes permiso para entrar en este recurso') }}
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="{{route('home')}}" class="btn btn-primary">Volver a la página principal</a>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('footer')
    @include('footer')
@endsection