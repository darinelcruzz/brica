@extends('admin')

@section('main-content')

    <data-table col="col-md-12"
        title="{{ $title }}" example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Descripción</th>
                @if ($title == 'Cotizaciones')
                    <th>Entrega</th>
                    <th>Empezar/Ver</th>
                @else
                    <th>Detalles</th>
                @endif
            </tr>
        </template>

        <template slot="body">
            @forelse($rows as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->type }}</td>
                    <td>{{ $row->description }}</td>
                    @if ($title == 'Cotizaciones')
                        <td>{{ $row->deliver }}</td>
                        <td>
                            <a href="{{ route('production.start', ['id' => $row->id]) }}"
                                class="btn btn-{{ $row->status === 'produccion' ? 'success': 'danger' }}">
                                    @if ($row->status === 'produccion')
                                        <i class="fa fa-eye"></i>
                                    @else
                                        <i class="fa fa-forward" aria-hidden="true"></i>
                                    @endif
                            </a>
                        </td>
                    @else
                        <td>
                            <a href="{{ route('production.order.details', ['id' => $row->id]) }}"
                                class="btn btn-success">
                                    <i class="fa fa-info"></i>nfo
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </template>
    </data-table>

    <row-woc col="col-md-12">
        @if($title != 'Cotizaciones')

                    @if (isset($row))
                        <a href="{{ route('production.operator') }}"
                            class="btn btn-primary">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                &nbsp;Regresar
                        </a>

                        <a href="{{ route('production.finish', ['id' => $row->quotation]) }}"
                            class="btn btn-danger pull-right">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                &nbsp;Terminar
                        </a>
                    @else
                        <label>No hay órdenes para esta cotización</label>
                        <br>
                        <a href="{{ route('production.change')}}" class="'btn btn-primary'">Cambiar estado</a>
                    @endif
        @endif
    </row-woc>

@endsection
