@extends('admin')

@section('main-content')
    <row-woc col="col-md-10">
        <solid-box title="Nueva Cotización">
            <!-- form start -->
            {!! Form::open(['method' => 'POST', 'route' => 'quotation.store']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('client', $clients, null,
                        ['tpl' => 'templates/withicon', 'empty' => 'Seleccione un cliente'], ['icon' => 'user']) !!}
                    </div>

                    <div class="col-md-6">
                        <a href="{{ route('client.create', ['from' => 'terminado'])}}">
                            <button type="button" class="btn btn-warning">Nuevo cliente</button>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Field::number('quotation', $lastQ + 1 ,['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('description',
                            ['tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                    </div>
                </div>

                <row-woc col="col-md-12">
                    <product-table :products="products"></product-table>
                </row-woc>

                <div class="box-footer">
                    <input type="hidden" name="status" value="pendiente">
                    <input type="hidden" name="type" value="terminado">
                    <input type="hidden" name="pay" value="venta">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-warning btn-block']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
