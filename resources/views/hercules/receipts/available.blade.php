@extends('hercules')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <data-table col="col-md-12" title="Comitán"
                example="example1" color="box-warning">
                <template slot="header">
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th><i class="fa fa-cogs"></i></th>
                        <th>Estado</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach($comitan as $receipt)
                      @if ($receipt->order)
                          @if ($receipt->order->status != 'cancelada')
                              <tr>
                                  <td>{{ $receipt->id }}</td>
                                  <td>
                                      {{ $receipt->bodywork ? $receipt->bodyworkr->description: 'REPARACIÓN' }}
                                      <br>
                                      <code>{{ $receipt->serial_number }}</code>
                                  </td>
                                  <td>
                                      <dropdown color="warning" icon="cogs">
                                          <ddi to="{{ route('hercules.receipt.export', [$receipt, 'palenque']) }}"
                                              icon="forward" text="A Palenque">
                                          </ddi>
                                          <ddi to="{{ route('hercules.receipt.edit', $receipt) }}"
                                              icon="user" text="Agregar cliente">
                                          </ddi>
                                          <ddi to="{{ Storage::url(substr($receipt->order->photo, 9)) }}"
                                              icon="eye" text="Ver foto">
                                          </ddi>
                                          <ddi to="{{ route('hercules.photo.load', $receipt->order) }}"
                                              icon="upload" text="Subir foto">
                                          </ddi>
                                      </dropdown>
                                  </td>
                                  <td>
                                      {{ ucfirst($receipt->order->status) }}
                                  </td>
                              </tr>
                          @endif
                      @endif
                    @endforeach
                </template>
            </data-table>
        </div>

        <div class="col-md-6">
            <data-table col="col-md-12" title="Palenque"
                example="example2" color="box-success">
                <template slot="header">
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th><i class="fa fa-cogs"></i></th>
                        <th>Estado</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach($palenque as $receipt)
                      @if ($receipt->order)
                          @if ($receipt->order->status != 'cancelada')
                              <tr>
                                  <td>{{ $receipt->id }}</td>
                                  <td>
                                      {{ $receipt->bodywork ? $receipt->bodyworkr->description: 'REPARACIÓN' }}
                                      &nbsp;&nbsp;

                                      <br>
                                      <code>{{ $receipt->serial_number }}</code>
                                  </td>
                                  <td>
                                      <dropdown color="success" icon="cogs">
                                          <ddi to="{{ route('hercules.receipt.export', [$receipt, 'comitan']) }}"
                                              icon="backward" text="A Comitán">
                                          </ddi>
                                          <ddi to="{{ route('hercules.receipt.edit', $receipt) }}"
                                              icon="user" text="Agregar cliente">
                                          </ddi>
                                          <ddi to="{{ Storage::url(substr($receipt->order->photo, 9)) }}"
                                              icon="eye" text="Ver foto">
                                          </ddi>
                                          <ddi to="{{ route('hercules.photo.load', $receipt->order) }}"
                                              icon="upload" text="Subir foto">
                                          </ddi>
                                      </dropdown>
                                  </td>
                                  <td>
                                      {{ ucfirst($receipt->order->status) }}
                                  </td>
                              </tr>
                          @endif
                      @endif
                    @endforeach
                </template>
            </data-table>
        </div>
    </div>

@endsection
