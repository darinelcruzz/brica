@extends('runa')

@section('main-content')

    <row-woc col="col-md-3">
        <a href="{{ route('runa.item.create') }}" class="btn btn-app">
            <span class="badge bg-yellow">{{ count($items) }}</span>
            <i class="fa fa-puzzle-piece"></i> Agregar
        </a>
    </row-woc>

    <row-woc col="col-md-12">
        <solid-box title="Control inventario" color="box-warning">

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Artículo</th>
                      <th>Unidad</th>
                      <th>Calibre</th>
                      <th>Peso</th>
                      <th>Entrada</th>
                      <th>Salida</th>
                      <th>Existencia</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                {{ $item->description }} &nbsp;
                                <a href="{{ route('runa.item.edit', ['id' => $item->id ])}}"
                                  title="EDITAR">
                                  <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{{ $item->unity }}</td>
                            <td>{{ $item->caliber }}</td>
                            <td>{{ $item->weight }}</td>
                            <td>
                                @include('runa.items.update_stock', ['color' => 'success', 'action' => 'plus'])
                            </td>
                            <td>
                                @include('runa.items.update_stock', ['color' => 'danger', 'action' => 'minus'])
                            </td>
                            <td>{{ $item->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </solid-box>
    </row-woc>

@endsection
