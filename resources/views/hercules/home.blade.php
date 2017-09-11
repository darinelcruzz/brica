@extends('hercules')

@section('main-content')
    <h3>Bienvenido, {{ $user->name or '' }}</h3>
    <div align="center">
        <img width="60%" height="60%" src="{{ asset('/img/carrocerias.png') }}">
    </div>
@endsection
