@extends('runa')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Corte simple" color="warning">
                {!! Form::open(['method' => 'POST', 'route' => 'runa.cut.update']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('client', 'N/A', ['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('quotation', 0,['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description', 'CORTE SIMPLE', ['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('advance', 0,
                                ['disabled' => '', 'tpl' => 'templates/withicon'],
                                ['icon' => 'barcode']) !!}
                        </div>
                    </div>

                    <row-woc col="col-md-12">
                        <product-table :products="products" :retainer="{{ 0 }}"
                            discount="{{ 0 }}">
                        </product-table>
                    </row-woc>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $rcut->id }}">
                        {!! Form::submit('Completar venta', ['class' => 'btn btn-warning pull-right']) !!}
                    </div>
                    {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection