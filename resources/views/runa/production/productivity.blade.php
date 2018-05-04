@extends('runa')

@section('main-content')

    @php
        $teamsData = [
            ['title' => 'R1', 'color' => 'primary', 'example' => '1'],
            ['title' => 'R2', 'color' => 'warning', 'example' => '2'],
            ['title' => 'R3', 'color' => 'success', 'example' => '3'],
            ['title' => 'R4', 'color' => 'default', 'example' => '4'],
            ['title' => 'RC', 'color' => 'danger', 'example' => '5'],
        ];
    @endphp

    @each('runa.production.team_table', $teamsData, 'team')

@endsection