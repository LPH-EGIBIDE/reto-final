@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
<table class="table align-middle my-5 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Nombre</th>
        <th>Precio Total</th>
        <th>Estado</th>
        <th>Descuento</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>
                <div class="d-flex align-items-center">
                    <img src="{{"https://www.gravatar.com/avatar/" . md5( strtolower( trim( auth()->user()->email ) ) ) . "&s=300&time=".time()}}" class="rounded-circle" height="42" alt="" loading="lazy" />
                    <div class="ms-3">
                    <p class="fw-bold mb-1">{{$order->user->name}}</p>
                    <p class="text-muted mb-0">{{$order->user->email}}</p>
                    </div>
                </div>
                </td>
                <td>
                <p class="badge badge-warning rounded-pill d-inline">{{$order->total}}€</p>
                </td>
                <td>
                    <span class="badge badge-{{$statuses[$order->status][1]}} rounded-pill d-inline">{{$statuses[$order->status][0]}}</span>
                </td>
                <td>
                    @if ($order->discount)
                        <span class="badge badge-success rounded-pill d-inline">{{$order->discount}}</span>
                    @else
                        <span class="badge badge-danger rounded-pill d-inline">Sin descuento</span>
                    @endif
                </td>
                <td>
                <button type="button" class="btn btn-link btn-sm btn-rounded order-info-btn" data-order-id="{{$order->id}}">
                    <i class="fas fa-info me-2"></i> Ver información
                </button>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
{{$orders->render()}}
<form action="{{route('order.api')}}" method="post" id="order-controls">
    @csrf
    <input type="hidden" name="id" id="order-id">
</form>
<div class="modal fade" id="order-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start text-black p-4">
                <h5 class="modal-title text-uppercase mb-5" >{{auth()->user()->name}}</h5>
                <h4 class="mb-5" style="color: #35558a;">Gracias por tu pedido</h4>
                <p class="mb-0" style="color: #35558a;">Lista de productos</p>
                <hr class="mt-2 mb-4"
                    style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
                <div class="order-modal-products">
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold mb-0">Medio pollo</p>
                        <p class="text-muted mb-0">€<span class="order-modal-product-price"></span></p>
                    </div>
                </div>

                <div class="d-flex justify-content-between pb-1 mt-2">
                    <p class="small">Subtotal</p>
                    <p class="small">€<span class="order-modal-subtotal"></span></p>
                </div>

                <div class="d-flex justify-content-between">
                    <p class="small mb-0">Fecha de entrega</p>
                    <p class="small mb-0 order-modal-date"></p>
                </div>

                <div class="d-flex justify-content-between">
                    <p class="small mb-0">Descuentos</p>
                    <p class="small mb-0">€<span class="order-modal-discount"></span></p>
                </div>

                <div class="d-flex justify-content-between">
                    <p class="fw-bold">Total</p>
                    <p class="fw-bold" style="color: #35558a;">€<span class="order-modal-total"></span></p>
                </div>



            </div>
            <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
                <button type="button" class="btn btn-primary btn-lg mb-1" data-mdb-dismiss="modal" aria-label="Close">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    @include('footer')
@endsection




