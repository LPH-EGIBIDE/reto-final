@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div class="row">
        <section class="col mb-5">
            <div class="p-5 text-center bg-image jumbotron-home"></div>
            <div class="container">
                <div class="card mx-1 mx-md-5 text-center shadow-5-strong jumbotron-home-card">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h1 class="display-3 fw-bold ls-tight mb-4">
                            <span>Escuela de hostelería</span>
                            <br>
                            <span class="text-primary">EGIBIDE</span>
                        </h1>
                        <a class="btn btn-primary btn-lg py-3 px-5 mb-2 mb-md-0 me-md-2" href="#categorias" role="button"  style="min-width: auto;"><i class="fa-solid fa-cart-shopping"></i> Realizar pedido</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="row mt-3" id="categorias">
        <h3 class="text-primary">Categorias</h3>
        <hr>
        <div class="col-12 col-md-10 offset-md-1">
            <div class="row">
                @foreach($categories as $category)
                    @include('categories.tile', ['category' => $category])
                @endforeach
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <h3 class="text-primary">Productos Destacados</h3>
        <hr>
        <div class="col">
            <div class="row">
                @foreach($products as $product)
                    @include('products.tile', ['product' => $product])
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection

