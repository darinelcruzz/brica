@extends('runa')

@section('main-content')

    @php
        $teamsData = [
            ['title' => 'Runa 1', 'color' => 'primary', 'example' => '1'],
            ['title' => 'Runa 2', 'color' => 'warning', 'example' => '2'],
            ['title' => 'Runa 3', 'color' => 'success', 'example' => '3'],
            ['title' => 'Runa 4', 'color' => 'default', 'example' => '4'],
            ['title' => 'Runa C', 'color' => 'danger', 'example' => '5'],
        ];
    @endphp

    @each('runa.production.team_table', $teamsData, 'team')

@endsection