@extends('runa')

@section('main-content')

<div class="row">
    <div class="col-md-6">
        <color-box title="Solicitar corte" color="warning">
        {!! Form::open(['method' => 'POST', 'route' => 'runa.cut.store']) !!}

            <div class="row">
                <div class="col-md-6">
                    {!! Field::number('quantity', 0, ['label' => 'Piezas', 'min' => '1', 'step' => '0.01'])!!}
                </div>
                <div class="col-md-6">
                    {!! Field::text('caliber')!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {!! Field::number('length', 0, ['min' => '0.01', 'step' => '0.01'])!!}
                </div>
                <div class="col-md-6">
                    {!! Field::number('width', 0, ['min' => '0.01', 'step' => '0.01'])!!}
                </div>
            </div>
            
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="team_id" value="{{ $runac->id }}">
            {!! Form::submit('Solicitar', ['class' => 'btn btn-warning pull-right']) !!}
        {!! Form::close() !!}
        </color-box>
    </div>

    <div class="col-md-6">
        <simple-box title="Historial cortes simples" color="warning">
            <dtable example="1">
                {{ drawHeader('#', 'cantidad', 'calibre', 'ancho', 'largo') }}

                <template slot="body">
                    @foreach($cuts as $cut)
                        <tr>
                            <td> {{ $cut->id }}</td>
                            <td>{{ $cut->quantity }}</td>
                            <td>{{ $cut->caliber }}</td>
                            <td>{{ $cut->width }}</td>
                            <td>{{ $cut->length }}</td>
                        </tr>
                    @endforeach
                </template>
            </dtable>
        </simple-box>
    </div>
</div>

@endsection