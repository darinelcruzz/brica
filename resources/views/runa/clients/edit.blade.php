@extends('runa')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Nuevo cliente" color="box-info">

            {!! Form::open(['method' => 'POST', 'route' => 'runa.client.change']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('name', $client->name, ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        {!! Field::text('city', $client->city, ['tpl' => 'templates/withicon'], ['icon' => 'globe']) !!}
                        {!! Field::text('phone', $client->phone, ['tpl' => 'templates/withicon'], ['icon' => 'phone']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::email('email', $client->email, ['tpl' => 'templates/withicon'], ['icon' => 'at']) !!}
                        {!! Field::text('address', $client->address, ['tpl' => 'templates/withicon'], ['icon' => 'map-marker']) !!}
                        {!! Field::text('rfc', $client->rfc, ['label' => 'R.F.C.', 'tpl' => 'templates/withicon'], ['icon' => 'book']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('contact', $client->contact, ['tpl' => 'templates/withicon'], ['icon' => 'volume-control-phone']) !!}
                    </div>

                    @if (Auth::user()->level == 1)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="control-label">Descuento (poner en 0 si se quiere quitar)</label>
                                <div class="input-group">
                                    @if ($client->discount > 0)
                                        <span class="input-group-addon">
                                          <input type="checkbox" checked>
                                        </span>
                                        <input type="number" min="0" name="discount" class="form-control" value="{{ $client->discount }}">
                                    @else
                                        <span class="input-group-addon">
                                          <input type="checkbox" v-model="checked">
                                        </span>
                                        <input type="number" min="0" name="discount" class="form-control" :disabled="!checked.length">
                                    @endif
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @if (Auth::user()->level == 1)
                    <row-woc col="col-md-6">
                        {!! Field::select('credit', ['No', 'Sí'], $client->credit,
                        ['tpl' => 'templates/withicon'], ['icon' => 'credit-card']) !!}
                    </row-woc>
                @endif

                <div class="box-footer">
                    <input type="hidden" name="id" value="{{ $client->id }}">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-info pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
