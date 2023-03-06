@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
@include('alerts')
 <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Registro de producto</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="text" id="productName" value="{{old('name')}}" name="name" class="form-control" required />
                                <label class="form-label" for="productName">Nombre producto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="productPrice" value="{{old('price')}}" name="price" class="form-control" required />
                                <label class="form-label" for="productPrice">Precio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="productDescription" name="description" rows="4" required>{{old('description')}}</textarea>
                                <label class="form-label" for="productDescription">Descripcion del producto</label>
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
                        <div class="col-md-6  mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="number" value="{{old('stock')}}" name="stock" id="productStock" class="form-control" required />
                                <label class="form-label" for="productStock">Stock</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <select class="select" name="categories[]" id="productCategory" multiple>
                                    @foreach ($categories as $category)
                                        <option  value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label select-label">Categoria</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
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