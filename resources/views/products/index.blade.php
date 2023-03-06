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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a href="#1" class="link-dark">The first list item</a>
                          <span class="badge badge-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a href="#1" class="link-dark">The second list item</a>
                          <span class="badge badge-primary rounded-pill">23</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <a href="#1" class="link-dark">The third list item</a>
                          <span class="badge badge-primary rounded-pill">9</span>
                        </li>
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
                <div class="col-lg-3 col-md-12 mb-3">
                  <div class="card hover-shadow">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                      data-mdb-ripple-color="light">
                      <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000"
                        class="w-100" />
                      <a href="#!">
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
        
                <div class="col-lg-3 col-md-12 mb-3">
                    <div class="card hover-shadow">
                      <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000"
                          class="w-100" />
                        <a href="#!">
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
          
                <div class="col-lg-3 col-md-12 mb-3">
                  <div class="card hover-shadow">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                      data-mdb-ripple-color="light">
                      <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000"
                        class="w-100" />
                      <a href="#!">
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
        
          
                <div class="col-lg-3 col-md-12 mb-3">
                  <div class="card hover-shadow">
                    <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                      <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000"
                        class="w-100" />
                      <a href="#!">
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
          
              <div class="row">
                <div class="col-lg-3 col-md-12 mb-3">
                    <div class="card hover-shadow">
                      <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000"
                          class="w-100" />
                        <a href="#!">
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
                <div class="col-lg-3 col-md-12 mb-3">
                  <div class="card hover-shadow">
                    <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                      <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000"
                        class="w-100" />
                      <a href="#!">
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
          
                <div class="col-lg-3 col-md-12 mb-3">
                  <div class="card hover-shadow">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                      data-mdb-ripple-color="light">
                      <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000" class="w-100" />
                      <a href="#!">
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
          
                <div class="col-lg-3 col-md-12 mb-3">
                  <div class="card hover-shadow">
                    <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                      <img src="https://img.freepik.com/foto-gratis/vista-frontal-deliciosa-carne-hamburguesa-queso-papas-fritas-tabla-cortar-fondo-oscuro-comida-rapida-comida-bocadillo-cena-plato-sandwich_140725-156319.jpg?w=2000" class="w-100" />
                      <a href="#!">
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
    </div>
    
      
    </div>
  </section>

@endsection

@section('footer')
    @include('footer')
@endsection

