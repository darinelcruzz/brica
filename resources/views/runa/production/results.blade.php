@extends('runa')

@section('main-content')

  <div class="row">
    <little-box color="bg-green" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R1</h3><h4>{{ $terminated->where('team', 'RC')->where('weight', '>', 0)->sum('weight') }} kg</h4>
    </little-box>

    <little-box color="bg-red" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R2</h3><h4>{{ $terminated->where('team', 'R2')->where('weight', '>', 0)->sum('weight') }} kg</h4>
    </little-box>

    <little-box color="bg-primary" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R3</h3><h4>{{ $terminated->where('team', 'R3')->where('weight', '>', 0)->sum('weight') }} kg</h4>
    </little-box>
  </div>

  <div class="row">
    <little-box color="bg-yellow" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>R4</h3><h4>{{ $terminated->where('team', 'R4')->where('weight', '>', 0)->sum('weight') }} kg</h4>
    </little-box>

    <little-box color="bg-purple" size="col-md-4" icon="fa fa-balance-scale">
      <p></p>
      <h3>RC</h3><h4>{{ $terminated->where('team', 'RC')->where('weight', '>', 0)->sum('weight') }} kg</h4>
    </little-box>
  </div>

@endsection