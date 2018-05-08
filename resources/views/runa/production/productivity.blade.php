@extends('runa')

@section('main-content')

    @php
        $teamsData = [
            ['title' => 'R1', 'color' => 'primary', 'example' => '1', 'cuts' => $cuts],
            ['title' => 'R2', 'color' => 'warning', 'example' => '2', 'cuts' => $cuts],
            ['title' => 'R3', 'color' => 'success', 'example' => '3', 'cuts' => $cuts],
            ['title' => 'R4', 'color' => 'default', 'example' => '4', 'cuts' => $cuts],
            ['title' => 'RC', 'color' => 'danger', 'example' => '5', 'cuts' => $cuts],
        ];
    @endphp

    @each('runa.production.team_table', $teamsData, 'team')

@endsection