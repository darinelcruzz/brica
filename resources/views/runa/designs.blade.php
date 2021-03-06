@extends('runa')

@section('main-content')

    <row-woc col="col-md-8">
        <solid-box title="Subir diseño" color="box-info">
            {!! Form::open([
                'method' => 'POST', 'route' => 'runa.design.upload', 'enctype' => 'multipart/form-data']) !!}
                {!! Field::text('name') !!}
                <input type="file" name="file" required>
                <input type="hidden" name="type" value="{{ $type }}">
                {!! Form::submit('Agregar', ['class' => 'btn btn-info pull-right']) !!}
            {!! Form::close() !!}
        </solid-box>
    </row-woc>

    <div class="row">
        <div class="col-md-4">
            <data-table-com title="Existentes"
                example="example6" color="box-info">
                <template slot="header">
                    <tr>
                        <th>Nombre</th>
                        <th>Ver</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach($designs as $design)
                      <tr>
                          <td>{{ substr($design, 15) }}</td>
                          <td>
                              <a href="{{ Storage::url($design) }}">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                              </a>
                          </td>
                      </tr>
                    @endforeach
                </template>
            </data-table-com>
        </div>

        @php
            $totalsize = 0;
        @endphp

        <div class="col-md-8">
            <data-table-com title="Temporales/nuevos"
                example="example1" color="box-default">
                <template slot="header">
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                        <th>Fecha</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach($temps as $temp)
                      <tr>
                          <td>
                              {{ substr($temp, 12) }} / {{ number_format(Storage::size($temp) / 1048576, 2) . ' MB' }}
                              @php
                                  $totalsize += Storage::size($temp) / 1048576;
                              @endphp
                          </td>
                          <td>
                              <a href="{{ Storage::url($temp) }}">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                              </a> &nbsp;&nbsp;
                              <a href="{{ route('runa.design.destroy', ['img' => substr($temp, 12)]) }}"
                                  title="ELIMINAR">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                              </a>
                          </td>
                          <td>
                              {{ date('d-m-Y', Storage::lastModified($temp)) }}
                          </td>
                      </tr>
                    @endforeach
                </template>

                <template slot="footer">
                    <tr>
                        <td>{{ number_format($totalsize, 2) . ' MB' }}</td>
                        <td>
                            <a href="{{ route('runa.design.clean', ['timespan' => 'm']) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                + 4 meses
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('runa.design.clean', ['timespan' => 'y']) }}" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i>
                                Año pasado
                            </a>
                        </td>
                    </tr>
                </template>
            </data-table-com>
        </div>
    </div>
@endsection
