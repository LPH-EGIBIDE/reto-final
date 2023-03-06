@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')

    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Categoria</div>
        <div class="card-body">
            <div class="container preview">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <input type="text" id="categoryName" class="form-control" disabled
                                       value="{{$category->name}}"/>
                                <label class="form-label" for="categoryName">Nombre categoria</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-center">
                                <img src="{{route('attachment.show.custom', [$category->attachment->id, '350', '250'])}}"
                                     alt="" class="img-fluid" srcset="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                    <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </div>
                            </div>
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