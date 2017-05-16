@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo usuario</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'user.store', 'class' => 'form-horizontal']) !!}
                  <div class="box-body">
                    {!! Field::text('name', ['label' => 'Nombre', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::text('user', ['label' => 'Usuario', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::select('hierarchy', ['1' => 'Principal', '2' => 'Ventas', '3' => 'Ordenes'],
                        ['label' => 'Jerarquía', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::password('password', ['label' => 'Contraseña', 'template' => 'templates/mytemplate1']) !!}
                    {!! Field::password('password2', ['label' => 'Repite contraseña', 'template' => 'templates/mytemplate1']) !!}
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