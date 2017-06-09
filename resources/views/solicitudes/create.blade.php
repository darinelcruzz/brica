@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva orden de venta</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'solicitude.store']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('client',
                            ['tpl' => 'templates/withicon'],
                            ['icon' => 'user']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('description',
                                ['tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('order', $lastId +1 ,['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('team', ['H1' => 'H1', 'H2' => 'H2', 'H3' => 'H3', 'N/A' => 'No asignar' ], null,
                            ['tpl' => 'templates/withicon'], ['icon' => 'users']) !!}
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="15%">Cant.</th>
                                <th width="10%">Unidad</th>
                                <th width="30%">Material</th>
                                <th width="15%">Precio x U</th>
                                <th width="20%">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i < 5; $i++)
                                <tr>
                                    <td>
                                        {!! Field::text($i, $i,['disabled' => '', 'tpl' => 'templates/nolabel']) !!}
                                    </td>
                                    <td>
                                        {!! Field::number('quantity' . $i, 5,['tpl' => 'templates/nolabel']) !!}
                                    </td>
                                    <td>
                                        {!! Field::text('unit' . $i, 'kg',['disabled' => '', 'tpl' => 'templates/nolabel']) !!}
                                    </td>
                                    <td>
                                        {!! Field::select('material' . $i, ['perfil' => 'Perfil', 'canalones' => 'Canalones'], null,
                                        ['tpl' => 'templates/nolabel']) !!}
                                    </td>
                                    <td>
                                        {!! Field::number('price' . $i,['disabled' => '', 'tpl' => 'templates/nolabel']) !!}
                                    </td>
                                    <td>
                                        {!! Field::number('amount' . $i,['disabled' => '', 'tpl' => 'templates/nolabel']) !!}
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        {!! Field::number('total', 100,['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'dollar']) !!}
                                    </td>
                                </tr>
                        </tfoot>
                    </table>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Equipos</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Equipo</th>
                                <th>Pendientes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>H1</td>
                                <td>3</td>                        
                            </tr>
                            <tr>
                                <td>H2</td>
                                <td>1</td>                        
                            </tr>
                            <tr>
                                <td>H3</td>
                                <td>5</td>                        
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection