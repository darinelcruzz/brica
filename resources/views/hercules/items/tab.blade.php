@php
  use App\Models\Hercules\HItem;
@endphp

<div class="tab-pane {{ $tab == 1 ? 'active': '' }}" id="tab_{{ $tab }}">
    <table id="example{{ $tab }}" class="table table-bordered table-hover">
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
                @if ($item->family == $process)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->code }}</td>
                        <td>
                            {{ $item->description }} &nbsp;
                            <a href="{{ route('hercules.item.destroy', $item)}}"
                              title="ELIMINAR">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('hercules.item.edit', $item)}}"
                              title="EDITAR">
                              <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            @if ($item->family == 'remolques')
                                <br>
                                <code>{{ '$ ' . number_format($item->price, 2) }}</code>
                            @endif
                        </td>
                        <td>
                            @include('hercules.items.update_stock', ['color' => 'success', 'action' => 'plus'])
                        </td>
                        <td>
                            @include('hercules.items.update_stock', ['color' => 'danger', 'action' => 'minus'])
                        </td>
                        <td>{{ $item->stock }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
