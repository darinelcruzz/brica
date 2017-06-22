@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva cotización</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'quotation.store']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('client', $clients, null,
                            ['tpl' => 'templates/withicon', 'empty' => 'Seleccione un cliente'], ['icon' => 'user']) !!}
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('client.create')}}">
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

                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" value="1" min="1" max="5" v-model="entries">
                        </div>
                    </div>

                    <div class="row">
                        <product-table :products="products" :entries="entries"></product-table>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('Siguiente', ['class' => 'btn btn-warning btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
