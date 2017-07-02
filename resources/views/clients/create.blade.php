@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo cliente</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'client.store', 'class' => 'form-horizontal']) !!}
                  <div class="box-body">
                    {!! Field::text('name', ['label' => 'Nombre', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::text('city', ['label' => 'Ciudad', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::text('phone', ['label' => 'Teléfono', 'tpl' => 'templates/oneline']) !!}
                    <hr>
                    {!! Field::text('address', ['label' => 'Dirección', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::text('rfc', ['label' => 'RFC', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::email('email', ['label' => 'Correo', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::text('contact', ['label' => 'Contacto', 'tpl' => 'templates/oneline']) !!}
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
@endsection
