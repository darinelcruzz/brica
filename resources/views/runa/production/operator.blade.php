@extends('runa')

@section('main-content')

    @if (auth()->user()->name != 'RC')
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
                @if (!empty($rows))
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->type }}</td>
                            <td>{{ $row->description }}</td>
                            @if ($title == 'Cotizaciones')
                                <td>{{ $row->deliver }}</td>
                                <td>
                                    <a href="{{ route('runa.operator.start', ['id' => $row->id]) }}"
                                        class="btn btn-{{ $row->status === 'produccion' ? 'success': 'danger' }} btn-xs">
                                            @if ($row->status === 'produccion')
                                                <i class="fa fa-eye"></i>
                                            @else
                                                <i class="fa fa-forward" aria-hidden="true"></i>
                                            @endif
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('runa.order.show', ['id' => $row->id]) }}"
                                        class="btn btn-primary btn-xs">
                                            <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </template>
        </data-table>

        <row-woc col="col-md-12">
            @if($title != 'Cotizaciones')
                <a href="{{ route('runa.operator.index') }}"
                    class="btn btn-primary">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        &nbsp;Regresar
                </a>

                <a href="{{ route('runa.operator.finish', ['id' => $id]) }}"
                    class="btn btn-danger pull-right">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        &nbsp;Terminar
                </a>
            @endif
        </row-woc>

    @else
        <div class="row">
            <div class="col-md-6">
                <data-table col="col-md-12"
                    title="Cortes pendientes" example="example1" color="box-danger">
                    <template slot="header">
                        <tr>
                            <th>#</th>
                            <th>Destino</th>
                            <th>Medidas</th>
                            <th>Piezas</th>
                            <th>Terminar</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach ($cuts as $cut)
                            @if ($cut->status == 'pendiente')
                                <tr>
                                    <td>{{ $cut->id }}</td>
                                    <td>{{ $cut->team->name }}</td>
                                    <td>{{ $cut->length . ' x ' . $cut->width }}</td>
                                    <td>{{ $cut->quantity }}, calibre {{ $cut->caliber }}</td>
                                    <td>
                                        <a href="{{ route('runa.cut.edit', ['id' => $cut->id, 'status' => 'terminado']) }}"
                                            class="btn btn-danger btn-xs">
                                                <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        @foreach ($rows as $row)
                            @foreach ($row->orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $row->clientr->name }}</td>
                                    <td>{{ $order->length . ' x ' . $order->width }}</td>
                                    <td>{{ $order->pieces }}, calibre {{ $order->caliber }}</td>
                                    <td>
                                        <a href="{{ route('runa.operator.finish', ['id' => $row->id]) }}"
                                            class="btn btn-danger btn-xs">
                                                <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </template>
                </data-table>
            </div>
            <div class="col-md-6">
                <data-table col="col-md-12"
                    title="Cortes terminados" example="example2" color="box-success">
                    <template slot="header">
                        <tr>
                            <th>#</th>
                            <th>Equipo</th>
                            <th>Medidas</th>
                            <th>Piezas</th>
                            <th>Entregado</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach ($cuts as $cut)
                            @if ($cut->status == 'terminado')
                                <tr>
                                    <td>{{ $cut->id }}</td>
                                    <td>{{ $cut->team->name }}</td>
                                    <td>{{ $cut->length . ' x ' . $cut->width }}</td>
                                    <td>{{ $cut->quantity }}, calibre {{ $cut->caliber }}</td>
                                    <td>
                                        <a href="{{ route('runa.cut.edit', ['id' => $cut->id, 'status' => 'entregado']) }}"
                                            class="btn btn-success btn-xs">
                                                <i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </data-table>
            </div>
        </div>

    @endif

@endsection
