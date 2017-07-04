@extends('admin')

@section('main-content')
    <row-woc col="col-md-10">
        <solid-box title="Nueva Cotización">
            <!-- form start -->
            {!! Form::open(['method' => 'POST', 'route' => 'quotation.store']) !!}
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
                        {!! Field::text('description', $quotation->decription, ['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::number('advance', $quotation->amount ,['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                    </div>
                </div>

                <row-woc col="col-md-12">
                    <product-table :products="products"></product-table>
                </row-woc>

                <div class="box-footer">
                    <input type="hidden" name="status" value="pendiente">
                    <input type="hidden" name="type" value="terminado">
                    <input type="hidden" name="pay" value="venta">
                    <input type="hidden" name="add" value=true>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-warning btn-block']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
