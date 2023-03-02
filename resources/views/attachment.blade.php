@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    @section('content')
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-6 mx-auto">
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
                <div class="card">
                    <div class="card-header">Test subida ficheros</div>
                    <div class="card-body">
                        <form action="{{ route('attachment.upload') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2 form-outline">

                                <input type="file" class="form-control form-control-lg" name="file" id="file" placeholder="Subida de ficheros">
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-success form-control" style="background-color: #1a459a; border-color: transparent;">Subir fichero <i class="fas fa-chevron-right"></i></button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endsection

@section('footer')
    @include('footer')
@endsection
