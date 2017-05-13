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
                    {!! Field::text('name', ['label' => 'Nombre', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::text('address', ['label' => 'Dirección', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::text('city', ['label' => 'Ciudad', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::text('rfc', ['label' => 'RFC', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::text('phone', ['label' => 'Teléfono', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::email('email', ['label' => 'Correo', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::text('contact', ['label' => 'Contacto', 'template' => 'templates/mytemplate1']) !!}
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