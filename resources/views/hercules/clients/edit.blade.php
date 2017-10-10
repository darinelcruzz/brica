@extends('hercules')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Nuevo cliente" color="box-primary">

            {!! Form::open(['method' => 'POST', 'route' => 'hercules.client.update']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('name', $hclient->name, ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        {!! Field::text('city', $hclient->city, ['tpl' => 'templates/withicon'], ['icon' => 'globe']) !!}
                        {!! Field::text('phone', $hclient->phone, ['tpl' => 'templates/withicon'], ['icon' => 'phone']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::email('email', $hclient->email, ['tpl' => 'templates/withicon'], ['icon' => 'at']) !!}
                        {!! Field::text('address', $hclient->address, ['tpl' => 'templates/withicon'], ['icon' => 'map-marker']) !!}
                        {!! Field::text('rfc', $hclient->rfc, ['label' => 'R.F.C.', 'tpl' => 'templates/withicon'], ['icon' => 'book']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('contact', $hclient->contact, ['tpl' => 'templates/withicon'], ['icon' => 'address-book-o']) !!}
                        {!! Field::text('contact_number', $hclient->contact_number, ['tpl' => 'templates/withicon'], ['icon' => 'volume-control-phone']) !!}
                    </div>

                    @if (Auth::user()->level == 1)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="control-label">Descuento (poner en 0 si se quiere quitar)</label>
                                <div class="input-group">
                                    @if ($hclient->discount > 0)
                                        <span class="input-group-addon">
                                          <input type="checkbox" checked>
                                        </span>
                                        <input type="number" min="0" name="discount" class="form-control" value="{{ $hclient->discount }}">
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
                        {!! Field::select('credit', ['No', 'Sí'], $hclient->credit,
                        ['tpl' => 'templates/withicon'], ['icon' => 'credit-card']) !!}
                    </row-woc>
                @endif

                <div class="box-footer">
                    <input type="hidden" name="id" value="{{ $hclient->id }}">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
