@extends('runa')

@section('main-content')
<h3>Bienvenido, {{ $user->name or '' }}</h3>
    <div align="center">
    	<img width="50%" height="50%" src="{{ asset('/img/logoruna.png') }}">
    </div>
@endsection
