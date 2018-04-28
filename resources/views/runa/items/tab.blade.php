@php
  use App\Models\Hercules\HItem;
@endphp

<div class="tab-pane {{ $tab == 1 ? 'active': '' }}" id="tab_{{ $tab }}">
    <table id="example{{ $tab }}" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Artículo</th>
                <th>Unidad</th>
                <th>Peso</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>#</th>
                <th>Kgs</th>
                <th>$</th>
                <th>Precio</th>
            </tr>
        </thead>

        <tbody>
            @php
                $totalStock = $totalMoney = 0;
            @endphp
            @foreach ($items as $item)
                @if (strtolower($item->brand) == $process)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            {{ $item->description }}
                            <br>
                            Calibre {{ $item->caliber }} &nbsp;
                            <a href="{{ route('runa.item.destroy', ['id' => $item->id ])}}"
                              title="ELIMINAR">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>&nbsp;
                            <a href="{{ route('runa.item.edit', ['id' => $item->id ])}}"
                              title="EDITAR">
                              <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            
                        </td>
                        <td>{{ $item->unity }}</td>
                        <td>{{ $item->weight }}</td>
                        <td>
                            @include('runa.items.update_stock', ['color' => 'success', 'action' => 'plus'])
                        </td>
                        <td>
                            @include('runa.items.update_stock', ['color' => 'danger', 'action' => 'minus'])
                        </td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ number_format($item->stock * $item->weight, 2) }}</td>
                        <td>$ {{ number_format($item->stock * $item->weight * $item->price, 2) }}</td>
                        <td>
                            @include('runa.items.update_price')
                        </td>
                        @php
                            $totalStock += $item->stock * $item->weight;
                            $totalMoney += $item->stock * $item->weight * $item->price;
                        @endphp
                    </tr>
                @endif
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td><b>Total:</b></td>
                <td>{{ number_format($totalStock, 2) }}</td>
                <td>$ {{ number_format($totalMoney, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</div>
