@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')

 <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Registro de producto</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="text" id="productName" class="form-control" required />
                                <label class="form-label" for="productName">Nombre producto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="price" class="form-control" required />
                                <label class="form-label" for="price">Precio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="productDescription" rows="4" required></textarea>
                                <label class="form-label" for="productDescription">Descripcion del producto</label>
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
                        <div class="col-md-6  mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="number" id="stock" class="form-control" required />
                                <label class="form-label" for="stock">Stock</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <select class="form-select" id="category" aria-label="Default select example">
                                    <option selected>Selecciona la categoria</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
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