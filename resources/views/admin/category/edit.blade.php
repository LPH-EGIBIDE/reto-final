@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @include('alerts')
    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Editar categoria</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="{{route('admin.category.update', $category->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-10">
                            <div class="form-outline">
                                <input type="text" name="name" id="categoryName" class="form-control" value="{{$category->name}}" required />
                                <label class="form-label" for="categoryName">Nombre categoria</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="is_homepage" type="checkbox" @if($category->is_homepage) checked @endif role="switch" id="paginaPrincipal" value="1" />
                                <label class="form-check-label" for="paginaPrincipal">Pagina principal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <input type="file" class="form-control form-control-lg" name="image" id="file" placeholder="Subida de ficheros">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Editar</button>
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