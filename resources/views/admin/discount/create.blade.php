@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @include('alerts')
    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Registro de codigos de descuento</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="{{route('admin.discount.store')}}">
                    @csrf
                    <div class="row mb-4 ">
                        <div class="col-md-9 mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="text" id="discountCode" name="code" class="form-control" required />
                                <label class="form-label" for="discountCode">Codigo</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-outline">
                                <input type="number" name="uses_left" id="discountUses_left" class="form-control" required />
                                <label class="form-label" for="discountUses_left">Usos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 ">
                        <div class="col-md-9 mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="text" id="discountValue" name="value" class="form-control" required />
                                <label class="form-label" for="discountValue">Valor del descuento</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="">
                                <select class="select" name="value_type" >
                                    <option value="amount">Dinero</option>
                                    <option value="percent">Porcentaje</option>
                                </select>
                                <label class="form-label select-label">Tipo de valor</label></div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" name="description" id="discountDescription" rows="4" required></textarea>
                                <label class="form-label" for="discountDescription">Descripcion del descuento</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
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