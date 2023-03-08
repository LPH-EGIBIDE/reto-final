@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('scripts')
    @vite('resources/js/productList.ts')
@endsection

@section('content')

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-4 d-none d-lg-block">
                    <div class="card border border-primary shadow-0">
                        <div class="card-body">
                            <div class="card-text">
                                <h5 class="p-1 border-bottom"><strong>Cátegoria</strong></h5>
                                <ul class="list-group list-group-light">
                                    @foreach ($categories as $category)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="?category={{$category->id}}"
                                               class="link-dark text-capitalize">{{$category->name}}</a>
                                            <span class="badge badge-primary rounded-pill">
                                                {{ $category->product->count() }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-text">
                                <h5 class="p-1 border-bottom mt-2"><strong>Precio</strong></h5>
                                <ul class="list-group list-group-light">
                                    <li class="list-group-item">
                                        <input class="form-check-input" type="radio" value="desc" name="menorMayor"
                                               aria-label="..."/>
                                        <label for="mayorMenor"> De mayor a menor </label>
                                    </li>
                                    <li class="list-group-item">
                                        <input class="form-check-input" type="radio" value="asc" name="menorMayor"
                                               aria-label="..."/>
                                        <label for="menorMayor"> De menor a mayor</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 text-center offset-2 offset-lg-0">
                    <div class="row" id="product-container">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-12 mb-3 product-order-by d-flex flex-column" data-product-id="{{$product->id}}"
                                 data-product-price="{{$product->price}}">
                                <div class="card hover-shadow border img-cursor h-100">
                                    <a href="{{route('product.show',$product)}}" class="text-reset">
                                        @if($product->attachment)
                                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light">
                                                <img
                                                        src="{{route('attachment.show.custom', [$product->attachment->id, '350', '250'])}}"
                                                        class="w-100" alt="producto"/>
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                         style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title "><strong>{{$product->name}}</strong></h5>
                                            <p class="card-text text-capitalize">
                                                @foreach ($product->categories as $pCategory)
                                                    {{$categories->find($pCategory->category_id)->name}}
                                                @endforeach
                                            </p>
                                            <h6 class="mb-3 act-price fs-5 mt-auto">{{$product->price}}€</h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="card">
                                    <div class="card-footer mt-auto">
                                        <a href="{{route('product.show',$product)}}" class="btn btn-primary btn-sm mt-auto"><i
                                                    class="fa-solid fa-cart-shopping"></i> Comprar
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>


            </div>
    </section>

@endsection

@section('footer')
    @include('footer')
@endsection

