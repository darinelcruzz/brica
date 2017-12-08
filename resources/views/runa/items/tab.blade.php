@php
  use App\Models\Hercules\HItem;
@endphp

<div class="tab-pane {{ $tab == 1 ? 'active': '' }}" id="tab_{{ $tab }}">
    <table id="example{{ $tab }}" class="table table-bordered table-hover">
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
                <th>Total (kg)</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                @if (strtolower($item->brand) == $process)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            {{ $item->description }} &nbsp;
                            <a href="{{ route('runa.item.destroy', ['id' => $item->id ])}}"
                              title="ELIMINAR">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <td>{{ number_format($item->stock * $item->weight, 2) }}</td>
                        @php
                            $totalStock += $item->stock * $item->weight;
                        @endphp
                    </tr>
                @endif
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td><b>Kg totales:</b></td>
                <td>{{ number_format($totalStock, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</div>
