@extends('layouts.auth')


@section('footer')
    @include('footer')

@endsection

@section('content')
    <div class="row d-flex align-items-center justify-content-center mb-5">
        <div class="col-lg-6 mx-auto mt-2">
            <div class="errors mb-3">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Error!</strong> {{ $error }}
                        </div>
                    @endforeach
                @endif
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Exito!</strong> {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="text-center mb-5">
                <img class="logo" src="{{Vite::asset('resources/images/logo.png')}}" alt="Logo">
            </div>
            <div class="card shadow-card hover-shadow">
                <div class="card-header">Registro de usuario</div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group mb-3 form-outline">
                            <input type="text" autocomplete="off" class=" form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" >
                            <label for="email" class="form-label">Nombre</label>
                        </div>

                        <div class="form-group mb-3 form-outline">
                            <input type="email" autocomplete="off" class=" form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="mc-user" >
                            <label for="email" class="form-label">Correo electronico</label>
                        </div>
                        <div class="form-group mb-3 form-outline">
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                            <label for="password" class="form-label">Contraseña:</label>
                        </div>
                        <div class="form-group mb-3 form-outline">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                            <label for="password" class="form-label">Repetir contraseña:</label>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <button class="btn btn-primary form-control" >Registrarse <i class="fas fa-chevron-right"></i></button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{route('login')}}">Ya tienes cuenta. Iniciar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



