@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    @include('alerts')
<section class="h-100 gradient-custom">
    <div class="container py-3">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Carrito</h5>
            </div>
            <div class="card-body" id="cart">
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body">
              <p><strong>Plazo de entrega previsto</strong></p>
              <p class="mb-0">12/10/2023 - 14/10/2023</p>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body">
              <p><strong>Métodos de pago</strong></p>
              <img class="me-2" width="45px"
                src="https://cdn-icons-png.flaticon.com/512/5968/5968299.png"
                alt="Visa" />
              <img class="me-2" width="45px"
                src="https://cdn-icons-png.flaticon.com/512/349/349228.png"
                alt="American Express" />
              <img class="me-2" width="45px"
                src="data:image/png;base64,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"
                alt="Mastercard" />
              <img class="me-2" width="45px"
                src="https://cdn-icons-png.flaticon.com/512/196/196566.png"
                alt="PayPal" />
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Resumen</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush" id="cart-list">
              </ul>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    Descuento
                  <span class="text-success"><span id="cart-discount">0</span>€</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                    <strong>Precio total</strong>
                    <strong>
                      <p class="mb-0">(IVA incluido)</p>
                    </strong>
                  </div>
                  <span class="act-price"><strong><span id="cart-total">0</span>€</strong></span>
                </li>
              </ul>

              <button type="button" class="btn btn-primary btn-lg btn-block">
                Finalizar compra
              </button>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="mb-0">Descuentos</h5>
            </div>
                <div class="card-body">
                    <form method="post" action="{{route('cart.addDiscount')}}" id="discount-input">
                        @csrf
                        <div class="input-group mb-3 form-outline" >
                            <input type="text" class="form-control" name="discount_code"  aria-describedby="button-addon2">
                            <label class="form-label" for="form1">Código de descuento</label>
                            <button class="btn btn-primary" type="submit" id="button-addon2">Aplicar</button>

                        </div>
                    </form>

                    <form method="post" action="{{route('cart.removeDiscount')}}" class="d-none" id="discount-input-applied">
                        @csrf
                        @method('DELETE')
                        <div class="input-group mb-3 " id="discount-input">
                            <input type="text" class="form-control" name="discount_code"  aria-describedby="button-addon2">
                            <button class="btn btn-danger" type="submit" id="button-addon2">Eliminar</button>

                        </div>
                    </form>
                    <form action="{{route('cart.update')}}" method="post" id="product-controls">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="method">
                        <input type="hidden" name="product_id">
                        <input type="hidden" name="quantity" value="1">

                    </form>
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

