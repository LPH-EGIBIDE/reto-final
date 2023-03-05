@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')

    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Editar de codigos de descuento</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="">
                    <div class="row mb-4">
                        <div class="col-md-7">
                            <div class="form-outline">
                                <input type="text" id="discountCode" class="form-control" required />
                                <label class="form-label" for="discountCode">Codigo</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-outline">
                                <input type="number" id="discountUses_left" class="form-control" required />
                                <label class="form-label" for="discountUses_left">Usos</label>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">Activo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <div class="form-outline">
                                <input type="text" id="discountValue" class="form-control" required />
                                <label class="form-label" for="discountValue">Valor del descuento</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="">
                                <select class="select">
                                    <option value="amount">Dinero</option>
                                    <option value="percent">Porcentaje</option>
                                </select>
                                <label class="form-label select-label">Tipo de valor</label></div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="discountDescription" rows="4" required></textarea>
                                <label class="form-label" for="discountDescription">Descripcion del descuento</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Editar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger btn-block">Borrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection