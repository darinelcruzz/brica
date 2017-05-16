@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva entrada</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'entries.store']) !!}
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                              {!! Field::number('quotation', ['label' => 'Cotización', 'tpl' => 'templates/withicon'],
                                  ['icon' => 'envelope']) !!}
                          </div>
                          <div class="col-md-6">
                              {!! Field::date('date', ['label' => 'Fecha', 'tpl' => 'templates/withicon'],
                                  ['icon' => 'calendar']) !!}
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              {!! Field::select('provider', ['1' => 'Sommer', '2' => 'Cedeño', '3' => 'Fortacero'], null,
                                  ['label' => 'Proveedor', 'tpl' => 'templates/withicon', 'empty' => 'Selecciona el proveedor'],
                                  ['icon' => 'handshake-o']) !!}
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                              {!! Field::number('amount', ['label' => 'Importe', 'tpl' => 'templates/withicon'],
                                  ['icon' => 'dollar']) !!}
                          </div>

                          <div class="col-md-6">
                              {!! Field::number('items', ['label' => 'Partidas', 'tpl' => 'templates/withicon'],
                                  ['icon' => 'paper-plane-o']) !!}
                          </div>
                      </div>

                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary btn-block']) !!}
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
