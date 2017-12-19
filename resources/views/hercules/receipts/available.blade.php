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
                        <th>Acción</th>
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
                                      {{ ucfirst($receipt->order->status) }}
                                  </td>
                                  <td>
                                      <div class="btn-group">
                                          <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-cogs" aria-hidden="true"></i>
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('hercules.receipt.export', ['id' => $receipt->id, 'location' => 'palenque']) }}">
                                                    <i class="fa fa-forward" aria-hidden="true"></i> Mover a Palenque
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('hercules.receipt.edit', ['id' => $receipt->id]) }}">
                                                    <i class="fa fa-user" aria-hidden="true"></i> Agregar cliente
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ Storage::url(substr($receipt->order->photo, 9)) }}">
                                                  <i class="fa fa-eye" aria-hidden="true"></i> Ver foto
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('hercules.photo.load', ['order' => $receipt->order->id]) }}">
                                                  <i class="fa fa-upload" aria-hidden="true"></i> Subir foto
                                                </a>
                                            </li>
                                          </ul>
                                      </div>
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
                        <th>Acción</th>
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
                                      {{ ucfirst($receipt->order->status) }}
                                  </td>
                                  <td>
                                      <div class="btn-group">
                                          <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-cogs" aria-hidden="true"></i>
                                            <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('hercules.receipt.export', ['id' => $receipt->id, 'location' => 'comitán']) }}">
                                                    <i class="fa fa-backward" aria-hidden="true"></i> Mover
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('hercules.receipt.edit', ['id' => $receipt->id]) }}">
                                                    <i class="fa fa-user" aria-hidden="true"></i> Agregar cliente
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ Storage::url(substr($receipt->order->photo, 9)) }}">
                                                  <i class="fa fa-eye" aria-hidden="true"></i> Ver foto
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('hercules.photo.load', ['order' => $receipt->order->id]) }}">
                                                  <i class="fa fa-upload" aria-hidden="true"></i> Subir foto
                                                </a>
                                            </li>
                                          </ul>
                                      </div>
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
