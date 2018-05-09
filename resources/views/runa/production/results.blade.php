@extends('runa')

@section('main-content')

  <div class="row">
    <little-box color="bg-green" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R1</h3><h4>{{ $pterminated->where('team', 'R1')->sum('weight') }} kg</h4>
    </little-box>

    <little-box color="bg-red" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R2</h3><h4>{{ $pterminated->where('team', 'R2')->sum('weight') }} kg</h4>
    </little-box>

    <little-box color="bg-primary" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R3</h3><h4>{{ $pterminated->where('team', 'R3')->sum('weight') }} kg</h4>
    </little-box>
  </div>

  <div class="row">
    <little-box color="bg-yellow" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R4</h3><h4>{{ $pterminated->where('team', 'R4')->sum('weight') }} kg</h4>
    </little-box>

    <little-box color="bg-purple" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>RC</h3><h4>{{ $pterminated->where('team', 'RC')->sum('weight') + $cutsSum }} kg</h4>
    </little-box>
  </div>

@endsection