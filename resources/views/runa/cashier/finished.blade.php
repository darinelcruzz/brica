@extends('runa')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <color-box title="Cotizaciones por pagar" color="danger">
                <dtable example="1">
                    {{ drawHeader('#', 'Cliente', 'Descripción', 'Anticipo', 'Cobrar') }}

                    <template slot="body">
                        @foreach($finished as $row)
                            @if (!$row->sale && $row->client != 1)
                                <tr>
                                    <td>{{ $row->folio }}</td>
                                    <td>{{ $row->clientr->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>$ {{ number_format($row->amount, 2) }}</td>
                                    <td>
                                      <a href="{{ route('runa.cashier.calculate', ['id' => $row->id]) }}"
                                          class="btn btn-success btn-xs">
                                          <i class="fa fa-dollar" aria-hidden="true"></i> <i class="fa fa-arrow-right"></i>
                                      </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </template>
                </dtable>
            </color-box>
        </div>
    </div>

@endsection
