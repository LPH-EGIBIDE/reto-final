@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    @include('alerts')
<section class="h-100 gradient-custom">
    <div class="container py-3">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-12 col-lg-8">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Carrito</h5>
            </div>
            <div class="card-body" id="cart">
            </div>
          </div>
        </div>
        <div class="co-12 col-lg-4">
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
               <div class="datos-envio my-3">

                    <div class="form-outline datetimepicker" data-mdb-inline="true" data-mdb-disable-past="true" >
                        <input type="text" class="form-control" id="datetimepickerInline" data-mdb-toggle="datetimepicker"/>
                        <label for="datetimepickerInline" class="form-label">Fecha para recoger</label>
                    </div>

            </div>

              <button type="submit" class="btn btn-primary btn-lg btn-block">
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

