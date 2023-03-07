@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection
@section('content')
    <div class="row d-flex justify-content-center  text-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger fs-1">{{ __('Mantenimiento') }}</div>

                <div class="card-body fs-4">
                    {{ __('Estamos realizando tareas de mantenimiento') }}
                </div>
            </div>

        </div>
    </div>

@endsection
@section('footer')
    @include('footer')
@endsection