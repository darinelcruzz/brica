@extends('runa')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <color-box title="Cotizaciones por pagar" color="danger">
                <dtable example="1">
                    {{ drawHeader('#', 'Cliente', 'Descripción', 'Anticipo', 'Cobrar') }}

                    <template slot="body">
                        @foreach($finished as $quotation)
                            {{-- @if (!$quotation->sale && $quotation->client != 1) --}}
                                <tr>
                                    <td>{{ $quotation->folio }}</td>
                                    <td>{{ $quotation->clientr->name }}</td>
                                    <td>{{ $quotation->description }}</td>
                                    <td>$ {{ number_format($quotation->amount, 2) }}</td>
                                    <td>
                                      <a href="{{ route('runa.cashier.calculate', $quotation) }}"
                                          class="btn btn-success btn-xs">
                                          <i class="fa fa-dollar" aria-hidden="true"></i> <i class="fa fa-arrow-right"></i>
                                      </a>
                                    </td>
                                </tr>
                            {{-- @endif --}}
                        @endforeach
                    </template>
                </dtable>
            </color-box>
        </div>
    </div>

@endsection
