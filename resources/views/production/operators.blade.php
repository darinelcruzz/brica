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
                    <th>Empezar</th>
                @else
                    <th>Detalle</th>
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
                                class="btn btn-danger">
                                    <i class="fa fa-play"></i>
                            </a>
                        </td>
                    @else
                        <td>
                            <a href="{{ route('production.order.details', ['id' => $row->id]) }}"
                                class="btn btn-success">
                                    <i class="fa fa-play"></i>
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </template>

        @if($title != 'Cotizaciones')
            <template slot="footer">
                    @if (isset($row))

                        <a href="{{ route('production.finish', ['id' => $row->quotation]) }}"
                            class="btn btn-danger">
                                <i class="fa fa-stop" aria-hidden="true"></i>
                                &nbsp;Terminar
                        </a>
                    @else
                        <label>No hay órdenes para esta cotización</label>
                        <br>
                        <a href="{{ route('production.change')}}" class="'btn btn-primary'">Cambiar estado</a>
                    @endif
            </template>
        @endif
    </data-table>

@endsection
