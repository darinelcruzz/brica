@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva entrada</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'entries.store', 'class' => 'form-horizontal']) !!}
                  <div class="box-body">
                    {!! Field::number('quotation', ['label' => 'Cotización', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('weight', ['label' => 'Peso', 'step' => 1, 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::text('date', ['label' => 'Fecha', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('provider', ['1' => 'Sommer', '2' => 'Cedeño', '3' => 'Fortacero'],
                        ['label' => 'Proveedor', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('amount', ['label' => 'Importe', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::number('items', ['label' => 'Partidas', 'template' => 'templates/mytemplate1']) !!}
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-info btn-block']) !!}
                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div align="center">
      <img width="22%" height="22%" src="{{ asset('/img/logo agua.png') }}">
    </div>

@endsection
