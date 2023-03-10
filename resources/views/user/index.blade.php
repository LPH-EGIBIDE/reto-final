@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
@include('alerts')
    <section>
        <div class="container my-3" >
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{$grav_url}}" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{$user->name}}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nombre Completo</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user->email}}</p>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('footer')
    @include('footer')
@endsection
