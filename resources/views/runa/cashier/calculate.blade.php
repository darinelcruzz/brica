@extends('runa')

@section('main-content')
    <row-woc col="col-md-10">
        <solid-box title="Nueva Cotización" color="box-warning">
            <!-- form start -->
            {!! Form::open(['method' => 'POST', 'route' => 'runa.sale.save']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('client', $quotation->clientr->name, ['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::number('quotation', $quotation->id ,['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('description', $quotation->description, ['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::number('advance', $quotation->amount ,
                            ['disabled' => '', 'tpl' => 'templates/withicon'],
                            ['icon' => 'barcode']) !!}
                    </div>
                </div>

                <row-woc col="col-md-12">
                    <product-table :products="products" :retainer="{{ $quotation->amount }}"
                        discount="{{ $quotation->clientr->discount / 100 }}">
                    </product-table>
                </row-woc>

                <div class="box-footer">
                    <input type="hidden" name="quotation" value="{{ $quotation->id }}">
                    <input type="hidden" name="retainer" value="{{ $quotation->amount }}">
                    {!! Form::submit('Completar venta', ['class' => 'btn btn-warning pull-right']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
