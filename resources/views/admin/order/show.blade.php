@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    <section>
        <div class="container my-3" >
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nombre del Cliente</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$order->user->name}}</p>
                                </div>
                            </div>
                            <hr>
                            @if($order->discount_code_id !=null)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Codigo de descuento</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$order->discountCode->code}}</p>
                                </div>
                            </div>

                            @endif

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">SubTotal</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$order->subtotal}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Total</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$order->total}}</p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Envio</p>
                                </div>
                            </div>
                            <div class="col-sm-9">
                               <!-- Select de envio -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <a href="{{route('admin.order.adminIndex')}}" class="btn btn-primary">Volver</a>
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