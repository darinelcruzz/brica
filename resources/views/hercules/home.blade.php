@extends('hercules')

@section('main-content')
    @if (date('d-m') == '27-09' && auth()->user()->id == 10)
    	<h3>¡¡Feliz cumpleaños, Fernando!!</h3>
    @else
    	<h3>Bienvenido, {{ $user->name or '' }}</h3>
    @endif
    <div align="center">
        <img width="60%" height="60%" src="{{ asset('/img/carrocerias.png') }}">
    </div>
@endsection
