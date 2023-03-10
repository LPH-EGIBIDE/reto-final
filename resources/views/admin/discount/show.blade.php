@extends('layouts.app')

@section('navbar')
    @include('admin.navbar')
@endsection

@section('content')

    <div class="card shadow-card hover-shadow mt-5">
        <div class="card-header">Ver código de descuento</div>
        <div class="card-body">
            <div class="container preview">
                    <div class="row mb-4">
                        <div class="col-md-7 mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="text" id="discountCode" value="{{$discountCode->code}}"
                                       class="form-control" required disabled/>
                                <label class="form-label" for="discountCode">Codigo</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-outline">
                                <input type="number" id="discountUses_left" value="{{$discountCode->uses_left}}"
                                       class="form-control" required disabled/>
                                <label class="form-label" for="discountUses_left">Usos</label>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center mt-2 mt-md-0">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" @if($discountCode->is_active) checked
                                       @endif id="flexCheckDefault" disabled/>
                                <label class="form-check-label" for="flexCheckDefault">Activo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-9 mb-2 mb-md-0">
                            <div class="form-outline">
                                <input type="text" id="discountValue" value="{{$discountCode->value}}"
                                       class="form-control" required disabled/>
                                <label class="form-label" for="discountValue">Valor del descuento</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="">
                                <select class="select" disabled>
                                    <option @if($discountCode->value_type == "amount") selected @endif  value="amount">
                                        Dinero
                                    </option>
                                    <option @if($discountCode->value_type == "percent") selected
                                            @endif  value="percent">Porcentaje
                                    </option>
                                </select>
                                <label class="form-label select-label">Tipo de valor</label></div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="discountDescription" rows="4" required
                                          disabled>{{$discountCode->description}}</textarea>
                                <label class="form-label" for="discountDescription">Descripcion del descuento</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <a href="{{ route('admin.discount.edit', $discountCode->id) }}"
                                   class="btn btn-primary btn-block">Editar</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{route('admin.discount.destroy', $discountCode->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">Borrar</button>
                                </form>
                            </div>
                            <div class="col-12 mt-3">
                                <a href="{{route('admin.discount.adminIndex')}}" class="btn btn-secondary w-100 fw-bold">Volver
                                    <i class="fa-solid fa-turn-down-left"></i></a>
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