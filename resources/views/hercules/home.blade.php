@extends('hercules')

@section('main-content')
    <h3>Bienvenido, {{ $user->name or '' }}</h3>
    <div align="center">
        <img width="70%" height="70%" src="{{ asset('/img/hercules.png') }}">
    </div>
@endsection
