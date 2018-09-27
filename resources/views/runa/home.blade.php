@extends('runa')

@section('main-content')
    @if (date('d-m') == '27-09' && auth()->user()->id == 10)
    	<h3>¡¡Feliz cumpleaños, Fernando!!</h3>
    	<div align="center">
	    	<img width="50%" height="50%" src="{{ asset('/img/cumple.png') }}">
	    </div>
    @else
    	<h3>Bienvenido, {{ $user->name or '' }}</h3>
    	 <div align="center">
	    	<img width="50%" height="50%" src="{{ asset('/img/logoruna.png') }}">
	    </div>
    @endif
@endsection
