@extends('admin')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Nuevo cliente" color="box-info">

            {!! Form::open(['method' => 'POST', 'route' => 'client.store']) !!}

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('name', ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        {!! Field::text('city', ['tpl' => 'templates/withicon'], ['icon' => 'globe']) !!}
                        {!! Field::text('phone', ['tpl' => 'templates/withicon'], ['icon' => 'phone']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::email('email', ['tpl' => 'templates/withicon'], ['icon' => 'at']) !!}
                        {!! Field::text('address', ['tpl' => 'templates/withicon'], ['icon' => 'map-marker']) !!}
                        {!! Field::text('rfc', ['label' => 'R.F.C.', 'tpl' => 'templates/withicon'], ['icon' => 'book']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('contact', ['tpl' => 'templates/withicon'], ['icon' => 'volume-control-phone']) !!}
                    </div>

                    @if (Auth::user()->level == 1)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="control-label">Descuento</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                      <input type="checkbox" v-model="checked">
                                    </span>
                                    <input type="number" min="0" name="discount" class="form-control" :disabled="!checked.length">
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @if (Auth::user()->level == 1)
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('credit', ['No', 'Sí'], 0,
                            ['tpl' => 'templates/withicon'], ['icon' => 'credit-card']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('folio', ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                    </div>
                @endif

                <div class="box-footer">
                    <input type="hidden" name="from" value="{{ $from }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-info pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
