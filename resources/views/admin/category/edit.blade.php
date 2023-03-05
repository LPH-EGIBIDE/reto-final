@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')

    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Editar categoria</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <input type="text" id="categoryName" class="form-control" required value="NOMBRE_CATEGORIA" />
                                <label class="form-label" for="categoryName">Nombre categoria</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <input type="file" class="form-control form-control-lg" name="file" id="file" placeholder="Subida de ficheros">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Editar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger btn-block">Borrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection