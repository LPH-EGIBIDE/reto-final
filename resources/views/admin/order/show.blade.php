@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @include('alerts')
    <section>
        <div class="container mt-5" >
            <div class="row">
                    <div class="card col-12 col-md-11  col-lg-6 ">
                        <div class="card-header">
                            <h5 class="mb-0">Datos pedido</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Nombre del cliente</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$order->user->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Email del cliente</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$order->user->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Pedido creado</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{{$pedidoCreado}}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Fecha recogida</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <!-- Select de fecha format  2023-03-18-->
                                    <p class="text-muted mb-0">{{{$order->date}}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card  col-12 col-md-11 col-lg-6">
                        <div class="card-header">
                            <h5 class="mb-0">Detalles pedido</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Cantidad productos</b></p>
                                </div>
                                <div class="col-sm-9">
                                   <p class="text-muted mb-0">{{{$order->orderDetails->sum('quantity')}}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Subtotal</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$order->subtotal}}</p>
                                </div>
                            </div>
                            <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Codigo de descuento</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        @if($order->discount_code_id)
                                        <p class="text-muted mb-0">{{{$order->discountCode->code}}}</p>
                                        @else
                                        <p class="text-muted mb-0">No hay codigo de descuento</p>
                                        @endif
                                    </div>
                                </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Total</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <!-- Select de fecha format  2023-03-18-->
                                    <p class="text-muted mb-0">{{{$order->total}}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row my-3">
                <div class="col card">
                    <div class="card-header">
                        <h5 class="mb-0">Editar estado</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <form action="{{route('admin.order.changestatus', $order->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="received" name="status">
                                    <button type="submit" class="btn btn-primary w-100" @if($order->status == "received" ) disabled @endif>Recibido</button>
                                </form>
                            </div>
                            <div class="col-3">
                                <form action="{{route('admin.order.changestatus', $order->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="processing" name="status">
                                    <button type="submit" class="btn btn-warning w-100" @if($order->status == "processing" ) disabled @endif>Procesando</button>
                                </form>
                            </div>
                            <div class="col-3">
                                <form action="{{route('admin.order.changestatus', $order->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="prepaired" name="status">
                                    <button type="submit" class="btn btn-success w-100" @if($order->status == "prepaired" ) disabled @endif>Preparado</button>
                                </form>
                            </div>
                            <div class="col-3">

                                <form action="{{route('admin.order.changestatus', $order->id)}}"  method="post">
                                    @csrf
                                    <input type="hidden" value="cancelled" name="status">
                                    <button type="submit" class="btn btn-danger w-100" @if($order->status == "cancelled" ) disabled @endif>Cancelado</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light table-light">
                    <tr>
                        <th >Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img class="rounded-circle" src="{{route('attachment.show.custom', [$orderDetail->product->attachment->id, '45', '45'])}}"/>
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <p class="mb-1">{{$orderDetail->product->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0">{{$orderDetail->quantity}}</p>
                            </td>
                            <td>
                                <p class="mb-0">{{$orderDetail->price}}</p>
                            </td>
                            <td>
                                <a href="{{route('admin.product.show', $orderDetail->product->id)}}" target="_blank" class="btn btn-primary"><i class="fa-solid fa-eye pe-2"></i>Ver producto</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <div class="col">
                    <a href="{{route('admin.order.adminIndex')}}" class="btn btn-secondary w-100 fw-bold">Volver <i class="fa-solid fa-turn-down-left"></i></a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    @include('footer')

@endsection