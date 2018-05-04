@extends('runa')

@section('main-content')

  <div class="row">
    <little-box color="bg-green" size="col-md-4" icon="fa fa-balance-scale">
      <p>KG</p>
      <h3>RUNA 1: {{ count($terminated->where('team', 'RC')->where('weight', '>', 0)) }}</h3>
    </little-box>

    <little-box color="bg-red" size="col-md-4" icon="fa fa-balance-scale">
      <p>KG</p>
      <h3>RUNA 2: {{ count($terminated->where('team', 'R2')->where('weight', '>', 0)) }}</h3>
    </little-box>

    <little-box color="bg-primary" size="col-md-4" icon="fa fa-balance-scale">
      <p>KG</p>
      <h3>RUNA 3: {{ count($terminated->where('team', 'R3')->where('weight', '>', 0)) }}</h3>
    </little-box>
  </div>

  <div class="row">
    <little-box color="bg-yellow" size="col-md-4" icon="fa fa-balance-scale">
      <p>KG</p>
      <h3>RUNA 4: {{ count($terminated->where('team', 'R4')->where('weight', '>', 0)) }}</h3>
    </little-box>

    <little-box color="bg-purple" size="col-md-4" icon="fa fa-balance-scale">
      <p>KG</p>
      <h3>RUNA C: {{ count($terminated->where('team', 'RC')->where('weight', '>', 0)) }}</h3>
    </little-box>
  </div>

@endsection