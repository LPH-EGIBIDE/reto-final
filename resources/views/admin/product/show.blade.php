@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @include('alerts')
    <div class="card shadow-card hover-shadow my-4 ">
        <div class="card-header">Ver Producto</div>
        <div class="card-body">
            <div class="container preview">
                <div class="row mb-4">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-outline">
                            <input type="text" id="productName" class="form-control" disabled
                                   value="{{$product->name}}"/>
                            <label class="form-label" for="productName">Nombre producto</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline">
                            <input type="text" id="price" class="form-control" disabled value="{{$product->price}}"/>
                            <label class="form-label" for="price">Precio</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-outline">
                            <textarea class="form-control" id="productDescription" rows="4"
                                      disabled>{{$product->description}}</textarea>
                            <label class="form-label" for="productDescription">Descripcion del producto</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12 ">
                        <div class="d-flex justify-content-center">
                            @if ($product->attachment)
                                <img src="{{route('attachment.show.custom', [$product->attachment->id, '350', '250'])}}"
                                     alt="" class="img-fluid" srcset="">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 mb-2 mb-md-0">
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
                <div class="card-footer">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <a href="{{ route('admin.product.edit', $product->id) }}"
                               class="btn btn-primary btn-block">Editar</a>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('admin.product.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block">Borrar</button>
                            </form>
                        </div>
                        <div class="col-12 mt-3">
                            <a href="{{url()->previous()}}" class="btn btn-secondary w-100 fw-bold">Volver
                                <i class="fa-solid fa-turn-down-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection