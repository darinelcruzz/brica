@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-4">
            <solid-box title="Subir diseño" color="box-info">
                {!! Form::open([
                    'method' => 'POST', 'route' => 'design.upload', 'enctype' => 'multipart/form-data']) !!}
                    {!! Field::text('name') !!}
                    <input type="file" name="file" required>
                    <input type="hidden" name="type" value="{{ $type }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </solid-box>
        </div>

        <div class="col-md-4">
            <data-table-com title="Diseños guardados"
                example="example6" color="box-info">
                <template slot="header">
                    <tr>
                        <th>Nombre</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach($designs as $design)
                      <tr>
                          <td>{{ substr($design, 15) }}</td>
                      </tr>
                    @endforeach
                </template>
            </data-table-com>
        </div>

    </div>
@endsection
