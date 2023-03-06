@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
  @include('alerts')
    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Editar producto</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="{{route('admin.product.edit', [$product->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="productName" name="name" value="{{$product->name}}" class="form-control" required />
                                <label class="form-label" for="productName">Nombre producto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="text" id="price" name="price" value="{{$product->price}}" class="form-control" required />
                                <label class="form-label" for="price">Precio</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="productDescription" name="description" rows="4" required> {{$product->description}}</textarea>
                                <label class="form-label" for="productDescription">Descripcion del producto</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <input type="file" name="image" class="form-control form-control-lg" id="file" placeholder="Subida de ficheros">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <input type="number" id="stock" name="stock" value="{{$product->stock}}" class="form-control" required />
                                <label class="form-label" for="stock">Stock</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select class="select" name="categories[]" id="productCategory" multiple >
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{in_array($category->id, $product->categories->pluck('category_id')->toArray()) ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="productCategory" class="form-label select-label">Categorias</label>
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