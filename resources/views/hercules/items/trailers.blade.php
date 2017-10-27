@extends('hercules')

@section('main-content')

    <row-woc col="col-md-3">
        <a href="{{ route('hercules.item.create', ['type' => 'inventario']) }}" class="btn btn-app">
            <span class="badge bg-aqua">{{ count($items) }}</span>
            <i class="fa fa-puzzle-piece"></i> Agregar
        </a>
    </row-woc>

    <row-woc col="col-md-12">
        <solid-box title="Inventario remolques" color="box-primary">

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Código</th>
                      <th>Artículo</th>
                      <th>Entrada</th>
                      <th>Salida</th>
                      <th>Existencia</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->code }}</td>
                            <td>
                                {{ $item->description }} &nbsp;
                                <a href="{{ route('hercules.item.destroy', ['id' => $item->id ])}}"
                                  title="ELIMINAR">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('hercules.item.edit', ['id' => $item->id ])}}"
                                  title="EDITAR">
                                  <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <br>
                                <code>{{ '$ ' . number_format($item->price, 2) }}</code>
                            </td>
                            <td>
                                @include('hercules.items.update_stock', ['color' => 'success', 'action' => 'plus'])
                            </td>
                            <td>
                                @include('hercules.items.update_stock', ['color' => 'danger', 'action' => 'minus'])
                            </td>
                            <td>{{ $item->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </solid-box>
    </row-woc>

@endsection
