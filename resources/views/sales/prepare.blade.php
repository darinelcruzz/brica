@extends('admin')

@section('main-content')
    @for ($i=0; $i < count($ids); $i++)
        {{ $ids[$i] }}
    @endfor
@endsection
