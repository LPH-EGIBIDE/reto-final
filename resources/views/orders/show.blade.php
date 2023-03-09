@extends('layouts.app')

@section('navbar')
    @include('navbar')
@endsection

@section('content')
    <p>{{$order}}</p>
@endsection
@section('footer')
    @include('footer')
@endsection
