@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')

    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Producto</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="productName" class="form-control" disabled value="NOMBRE_PRODUCTO" />
                                <label class="form-label" for="productName">Nombre producto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="price" class="form-control" disabled value="PRECIO_PRODUCTO" />
                                <label class="form-label" for="price">Precio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="productDescription" rows="4" disabled value="DESCRIPCION_PRODUCTO"></textarea>
                                <label class="form-label" for="productDescription">Descripcion del producto</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-center">
                                <img src="https://static-sevilla.abc.es/media/gurmesevilla/2012/01/comida-rapida-casera.jpg" alt="" srcset="" height="200">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="number" id="stock" class="form-control" disabled value="STOCK" />
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
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.product.edit') }}" class="btn btn-primary">Editar</a>
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