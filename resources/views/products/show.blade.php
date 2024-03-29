@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
@include('alerts')
    <div class="row mt-lg-5 my-3">
        <div class="col-lg-10 offset-lg-1">
            <div class="card shadow-card hover-shadow">
                <div class="row">
                    @if($product->attachment)
                    <div class="col-md-6 d-flex align-items-center">
                            <div class="p-4">
                                <img class="img-fluid" src="{{route('attachment.show.custom', [$product->attachment->id, '450', '300'])}}"/>
                            </div>
                    </div>
                    @endif
                    <div class="col-md-6">
                        <div class="product p-4">
                            <form action="{{route('cart.update')}}" class="cart-product-form" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="method" value="push">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"><a href="{{route('product.index')}}" class="ml-1 text-muted"><i class="fa fa-long-arrow-left p-1"></i> Volver</a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-1"> <span class="text-uppercase text-muted brand">
                                  @foreach ($product->categories as $pCategory)
                                    {{$pCategory->category->name}}
                                  @endforeach</span>
                                    <h5 class="text-uppercase">{{$product->name}}</h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price p-1">{{$product->price}}€</span>
                                        <!-- <div class="ml-2">
                                            <small class="dis-price">$50</small> <span>50% DESCUENTO</span>
                                        </div> -->
                                    </div>
                                </div>
                                <p class="about">{{$product->description}}</p>
                                @if($product->stock < 0)
                                    <div class="alert alert-danger" role="alert">
                                        No hay stock de este producto
                                    </div>
                                @else
                                    <div class="form-outline">
                                        <input type="number" id="typeNumber" name="quantity" class="form-control" value="1" min="1" max="{{$product->stock}}"/>
                                        <label class="form-label" for="typeNumber">Cantidad</label>
                                    </div>
                                    <div class="cart mt-4 align-items-center">
                                        <button type="submit" class="btn btn-danger text-uppercase mr-2 px-4">Añadir al carro &nbsp;<i class="fa-solid fa-cart-circle-plus fs-6"></i></button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="text-center container py-5">
          <h4 class="mt-4 mb-4 pb-3 border-bottom"><strong>Productos relacionados</strong></h4>
          <div class="row">
            @foreach($relatedProducts as $relatedProduct)
             <div class="col-lg-4 offset-1 offset-lg-0 col-10 col-lg mb-4 product can-order-by" >
              <div class="card border hover-shadow img-cursor">
               <a href="{{route('product.show',$relatedProduct->id)}}" class="text-reset">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                  data-mdb-ripple-color="light">
                  <img src="{{route('attachment.show.custom', [$relatedProduct->attachment->id, '700', '460'])}}" class="img-fluid" />
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-3"><strong>{{$relatedProduct->name}}</strong></h5>
                    <p class="text-capitalize">@foreach ($relatedProduct->categories as $pCategory)
                      {{$pCategory->category->name}}
                    @endforeach</p>
                  <h6 class="mb-3 act-price p-1">{{$relatedProduct->price}}€</h6>
                  <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-cart-shopping"></i> Comprar</button>
                </div>
                </a>
              </div>
            </div>
              @endforeach
            </div>
          </div>
      </section>
@endsection

@section('footer')
    @include('footer')
@endsection

