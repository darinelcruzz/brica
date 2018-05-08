@extends('runa')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
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
                                    <td>$ {{ $row->amount }}</td>
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

        <div class="col-md-6">
            <color-box title="Cortes simples" color="warning">
                <dtable example="2">
                    {{ drawHeader('#', 'cantidad', 'calibre', 'ancho', 'largo', 'cobrar') }}

                    <template slot="body">
                        @foreach($cuts as $cut)
                            <tr>
                                <td> {{ $cut->id }}</td>
                                <td>{{ $cut->quantity }}</td>
                                <td>{{ $cut->caliber }}</td>
                                <td>{{ $cut->width }}</td>
                                <td>{{ $cut->length }}</td>
                                <td>
                                  <a href="{{ route('runa.cut.calculate', ['id' => $cut->id]) }}"
                                      class="btn btn-success btn-xs">
                                      <i class="fa fa-dollar" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                                  </a>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </dtable>
            </color-box>
        </div>
    </div>

@endsection
