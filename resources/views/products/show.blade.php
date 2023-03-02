@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div class="row mt-lg-5">
        <div class="col-lg-10 offset-lg-1">
            <div class="card shadow-card hover-shadow">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                            <div class="p-4">
                                <img class="img-fluid" src="https://images3.alphacoders.com/597/597575.jpg" />
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <form action="" method="POST">
                                @csrf
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left p-1"></i> <a href="/" class="ml-1 text-muted">Volver</a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-1"> <span class="text-uppercase text-muted brand">Segundo</span>
                                    <h5 class="text-uppercase">Brocheta de pescado y verduritas</h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price p-1">$25</span>
                                        <div class="ml-2">
                                            <small class="dis-price">$50</small> <span>50% DESCUENTO</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="about">Shop from a wide range of t-shirt from orianz. Pefect for your everyday use, you could pair it with a stylish pair of jeans or trousers complete the look.</p>
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
          <h4 class="mt-4 mb-5"><strong>Productos relacionados</strong></h4>
          <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                  data-mdb-ripple-color="light">
                  <img src="https://w0.peakpx.com/wallpaper/780/28/HD-wallpaper-delicious-meal-meal-lunch-delicious-food-meat-salad.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask">
                      <div class="d-flex justify-content-start align-items-end h-100">
                        <h5><span class="badge bg-primary ms-2">New</span></h5>
                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                  </a>
                </div>
                <div class="card-body">
                  <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                  </a>
                  <a href="" class="text-reset">
                    <p>Category</p>
                  </a>
                  <h6 class="mb-3">$61.99</h6>
                </div>
              </div>
            </div>
      
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                  data-mdb-ripple-color="light">
                  <img src="https://w0.peakpx.com/wallpaper/566/30/HD-wallpaper-hungry-pizza-food-happy-eating.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask">
                      <div class="d-flex justify-content-start align-items-end h-100">
                        <h5><span class="badge bg-success ms-2">Eco</span></h5>
                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                  </a>
                </div>
                <div class="card-body">
                  <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                  </a>
                  <a href="" class="text-reset">
                    <p>Category</p>
                  </a>
                  <h6 class="mb-3">$61.99</h6>
                </div>
              </div>
            </div>
      
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                  <img src="https://w0.peakpx.com/wallpaper/612/979/HD-wallpaper-food-burger.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask">
                      <div class="d-flex justify-content-start align-items-end h-100">
                        <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                  </a>
                </div>
                <div class="card-body">
                  <a href="" class="text-reset">
                    <h5 class="card-title mb-3">Product name</h5>
                  </a>
                  <a href="" class="text-reset">
                    <p>Category</p>
                  </a>
                  <h6 class="mb-3">
                    <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

@section('footer')
    @include('footer')
@endsection

