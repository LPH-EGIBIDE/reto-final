@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')

<section>
    <div class="container py-5">
    <div class="row">
        <div class="col-3">
            <div class="card border border-primary shadow-0">

                <div class="card-body">
                    <div class="card-text">
                      <h6 class="p-1 border-bottom"><strong>Cátegoria</strong></h6>
                      <ul class="list-group list-group-light">
                        @foreach ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a href="?category={{$category->id}}" class="link-dark text-capitalize">{{$category->name}}</a>
                          <span class="badge badge-primary rounded-pill">
                            {{$count->filter(function ($product) use ($category) {
                              return $product->categories->contains('category_id', $category->id);
                            })->count()}}</span>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="card-text">
                      <h6 class="p-1 border-bottom mt-2"><strong>Precio</strong></h6>
                      <ul class="list-group list-group-light">
                        <li class="list-group-item">
                          <input class="form-check-input" type="radio" value="" id="mayorMenor" name="precio" aria-label="..." />
                          <label for="mayorMenor"> De mayor a menor </label>
                        </li>
                        <li class="list-group-item">
                          <input class="form-check-input" type="radio" value="" id="menorMayor" name="precio" aria-label="..." />
                          <label for="menorMayor"> De menor a mayor</label>
                        </li>
                      </ul>
                    </div>
                  <button type="button" class="btn btn-primary">Buscar</button>
                </div>
              </div>
        </div>
        <div class="col-9 text-center">
            <div class="row">
              @foreach ($products as $product)
              <div class="col-lg-3 col-md-12 mb-3">
                <div class="card hover-shadow border img-cursor">
                  <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light">
                    <img src="{{route('attachment.show.custom', [$product->attachment->id, '350', '250'])}}" class="w-100" />
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </div>
                  </div>
                  <div class="card-body">
                    <a href="{{route('product.show',$product)}}" class="text-reset">
                      <h5 class="card-title mb-2"><strong>{{$product->name}}</strong></h5>
                    </a>
                    <p class="card-text text-capitalize">
                      @foreach ($product->categories as $pCategory)
                          {{$pCategory->category->name}}
                      @endforeach
                    </p>
                    <h6 class="mb-3">{{$product->price}}€</h6>
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

