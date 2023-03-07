@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
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
                            <form action="" method="POST">
                                @csrf
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
                                <div class="form-outline">
                                    <input type="number" id="typeNumber" class="form-control" value="1" min="1"/>
                                    <label class="form-label" for="typeNumber">Cantidad</label>
                                </div>
                                <div class="cart mt-4 align-items-center">
                                    <input type="submit" class="btn btn-danger text-uppercase mr-2 px-4" value="Añadir al carro">
                                </div>
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
            @for ($i = 1; $i <= 3; $i++)
            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card border hover-shadow img-cursor">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                  data-mdb-ripple-color="light">
                  <img src="{{route('attachment.show.custom', [$products->find($i)->attachment->id, '350', '230'])}}" class="w-100" />
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </div>
                <div class="card-body">
                  <a href="{{route('product.show',$products->find($i))}}" class="text-reset">
                    <h5 class="card-title mb-3"><strong>{{$products->where('id',$i)->value('name')}}</strong></h5>
                  </a>
                    <p class="text-capitalize">@foreach ($products->find($i)->categories as $pCategory)
                      {{$pCategory->category->name}}
                    @endforeach</p>
                  <h6 class="mb-3 act-price p-1">{{$products->where('id',$i)->value('price')}}€</h6>
                </div>
              </div>
            </div>
            @endfor
            </div>
          </div>
        </div>
      </section>
@endsection

@section('footer')
    @include('footer')
@endsection

