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
                                      &nbsp;&nbsp;
                                      <a href="{{ route('hercules.receipt.export', ['id' => $receipt->id, 'location' => 'palenque']) }}"
                                          class="btn btn-warning btn-xs" title="ENVIAR A PALENQUE">
                                          P <i class="fa fa-forward" aria-hidden="true"></i>
                                      </a>
                                      <a href="{{ route('hercules.receipt.edit', ['id' => $receipt->id]) }}"
                                          class="btn btn-info btn-xs" title="AGREGAR CLIENTE">
                                          <i class="fa fa-dollar" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i>
                                      </a>
                                      <a href="{{ route('hercules.receipt.show', ['id' => $receipt->id]) }}"
                                          class="btn btn-default btn-xs" title="IMPRIMIR RECIBO">
                                          <i class="fa fa-print" aria-hidden="true"></i>
                                      </a>
                                      &nbsp;&nbsp;
                                      @if ($receipt->order->photo)
                                          <a href="{{ Storage::url(substr($receipt->order->photo, 9)) }}"
                                            class="btn btn-primary btn-xs"  title='FOTO'>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                          </a>
                                      @endif
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
                                      <a href="{{ route('hercules.receipt.export', ['id' => $receipt->id, 'location' => 'comitán']) }}"
                                          class="btn btn-success btn-xs" title="ENVIAR A COMITÁN">
                                          <i class="fa fa-backward" aria-hidden="true"></i> C
                                      </a>
                                      <a href="{{ route('hercules.receipt.edit', ['id' => $receipt->id]) }}"
                                          class="btn btn-primary btn-xs" title="AGREGAR CLIENTE">
                                          <i class="fa fa-dollar" aria-hidden="true"></i> <i class="fa fa-user" aria-hidden="true"></i>
                                      </a>
                                      <a href="{{ route('hercules.receipt.show', ['id' => $receipt->id]) }}"
                                          class="btn btn-default btn-xs" title="IMPRIMIR RECIBO">
                                          <i class="fa fa-print" aria-hidden="true"></i>
                                      </a>
                                      @if ($receipt->order->photo)
                                          <a href="{{ Storage::url(substr($receipt->order->photo, 9)) }}"
                                            class="btn btn-primary btn-xs"  title='FOTO'>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                          </a>
                                      @endif
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
