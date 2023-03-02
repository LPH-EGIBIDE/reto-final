@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <div class="row ">
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
@endsection

@section('footer')
    @include('footer')
@endsection

