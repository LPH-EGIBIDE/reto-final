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
                <div class="card-header">Busqueda por filtros</div>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the
                    card's content.
                  </p>
              
                  <button type="button" class="btn btn-primary">Button</button>
                </div>
              </div>
        </div>
        <div class="col-9 text-center">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-3">
                  <div class="card">
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
                    <div class="card">
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
                  <div class="card">
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
                  <div class="card">
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
                    <div class="card">
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
                  <div class="card">
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
                  <div class="card">
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
                  <div class="card">
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

