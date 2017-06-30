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
                        {!! Field::select('type', ['terminado' => 'Terminado', 'trabajo' => 'Trabajo'], null,
                            ['tpl' => 'templates/withicon', 'empty' => 'Tipo de operación', 'v-model' => 'type'],
                            ['icon' => 'user']) !!}
                    </div>

                    <div v-if="type != 'terminado'" class="col-md-6">
                        {!! Field::number('amount', 0, ['tpl' => 'templates/withicon'], ['icon' => 'usd']) !!}
                    </div>
                </div>

                <template v-if="type === 'terminado'">
                    <row-woc col="col-md-6">
                        ¿Cuántos artículos? <input type="number" value="1" min="1" max="5" v-model="entries"> (máximo 5)
                    </row-woc>

                    <row-woc col="col-md-12">
                        <product-table :products="products" :entries="entries"></product-table>
                    </row-woc>
                </template>

                <div class="box-footer">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-warning btn-block']) !!}
                </div>
                {!! Form::close() !!}
        </solid-box>
    </row-woc>
@endsection
