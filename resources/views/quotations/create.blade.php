@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva cotización</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'quotation.store']) !!}
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
                            {!! Field::number('quotation', 1 ,['disabled' => '', 'tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
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
                            <tr>
                                <td>
                                    {!! Field::text('id[]', '1', ['disabled' => '', 'tpl' => 'templates/nolabel']) !!}
                                </td>
                                <td>
                                    {!! Field::number('quantity[]', 5, ['tpl' => 'templates/nolabel', 'min' => 0]) !!}
                                </td>
                                <td>
                                    kg
                                </td>
                                <td>
                                    {!! Field::select('material[]', $products, null,
                                    ['tpl' => 'templates/nolabel', 'empty' => 'Seleccione producto']) !!}
                                </td>
                                <td>
                                    {!! Field::number('price[]', ['disabled' => '', 'tpl' => 'templates/nolabel']) !!}
                                </td>
                                <td>
                                    {!! Field::number('amount[]', ['disabled' => '', 'tpl' => 'templates/nolabel']) !!}
                                </td>
                            </tr>
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
    </div>
@endsection
