@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')
    @include('alerts')
    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Editar de codigos de descuento</div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="{{route('admin.discount.update', $discountCode->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-md-7">
                            <div class="form-outline">
                                <input type="text" name="code" id="discountCode" value="{{$discountCode->code}}" class="form-control" required  />
                                <label class="form-label" for="discountCode">Codigo</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-outline">
                                <input type="number" name="uses_left" id="discountUses_left" value="{{$discountCode->uses_left}}" class="form-control" required  />
                                <label class="form-label" for="discountUses_left">Usos</label>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <div class="form-check ">
                                <input class="form-check-input" name="is_active" type="checkbox" @if($discountCode->is_active) checked @endif id="flexCheckDefault" value="1"  />
                                <label class="form-check-label" for="flexCheckDefault">Activo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-9">
                            <div class="form-outline">
                                <input type="text" id="discountValue" name="value" value="{{$discountCode->value}}" class="form-control" required  />
                                <label class="form-label" for="discountValue">Valor del descuento</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="">
                                <select id="discountType" name="value_type" class="select" >
                                    <option  @if($discountCode->value_type == "amount") selected @endif  value="amount">Dinero</option>
                                    <option @if($discountCode->value_type == "percent") selected @endif  value="percent">Porcentaje</option>
                                </select>
                                <label for="discountType" class="form-label select-label">Tipo de valor</label></div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" name="description" id="discountDescription" rows="4" required >{{$discountCode->description}}</textarea>
                                <label class="form-label" for="discountDescription">Descripcion del descuento</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Editar</button>
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