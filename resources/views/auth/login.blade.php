@extends('layouts.auth')


@section('footer')
    @include('footer')

@endsection

@section('content')
    <div class="row d-flex align-items-center justify-content-center ">
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
                <div class="card-header">Iniciar sesión</div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group mb-3 form-outline">
                            <input type="text" autocomplete="off" class=" form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="mc-user" >
                            <label for="email" class="form-label">Correo electronico</label>
                        </div>
                        <div class="form-group mb-3 form-outline">
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                            <label for="password" class="form-label">Contraseña:</label>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberMe">
                                            Mantener sesión iniciada
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success form-control" style="background-color: #1a459a; border-color: transparent;">Iniciar sesión <i class="fas fa-chevron-right"></i></button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6 text-center mb-2 mb-md-0">
                            <a href="{{route('password.request')}}">¿Has olvidado tu contraseña?</a>
                        </div>
                        <div class="col-md-6 text-center ">
                            <a href="{{route('register')}}">¿No tienes cuenta? Registrate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


