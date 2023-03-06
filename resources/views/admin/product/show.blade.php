@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @include('alerts')
    <div class="card shadow-card hover-shadow my-4 ">
        <div class="card-header">Editar producto</div>
        <div class="card-body">
            <div class="container">
                <form>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="productName" class="form-control" disabled value="{{$product->name}}" />
                                <label class="form-label" for="productName">Nombre producto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="price" class="form-control" disabled value="{{$product->price}}" />
                                <label class="form-label" for="price">Precio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="productDescription" rows="4" disabled >{{$product->description}}</textarea>
                                <label class="form-label" for="productDescription">Descripcion del producto</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-center">
                                <img src="{{route('attachment.show.custom', [$product->attachment->id, '350', '250'])}}" alt="" class="img-fluid" srcset="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="number" id="stock" class="form-control" disabled value="{{$product->stock}}"/>
                                <label class="form-label" for="stock">Stock</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <select class="select" name="categories[]" id="productCategory" multiple disabled>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{in_array($category->id, $product->categories->pluck('category_id')->toArray()) ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label select-label">Categorias</label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Editar</a>
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