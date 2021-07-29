@extends('hercules')

@section('main-content')

<div class="row">
  <div class="col-md-12">
    <color-box title="RECIBOS" color="primary">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>ID</th>
              <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
              <th>Cliente</th>
              <th>Concepto</th>
              <th>Anticipo</th>
              <th>Color</th>
              <th style="width: 20%">Observaciones</th>
          </tr>
        </thead>

        <tbody>
          @foreach($receipts as $receipt)
              <tr>
                <td>{{ $receipt->id }}</td>
                <td>
                    <dropdown color="primary" icon="cogs">
                        <ddi to="{{ route('hercules.receipt.show', $receipt) }}" icon="print" text="Imprimir"></ddi>
                        @if(!$receipt->order)
                          <ddi to="{{ route('hercules.receipt.order', $receipt) }}" icon="forward" text="Mandar a producción"></ddi>
                        @endif
                        @if(auth()->user()->level == 1)
                          <ddi to="{{ route('hercules.receipt.edit', $receipt) }}" icon="edit" text="Editar"></ddi>
                        @endif
                    </dropdown>
                </td>
                <td>
                  {{ $receipt->name }}
                  @if(!$receipt->order)
                    &nbsp;<i style="color: orange;" class="fa fa-warning"></i>
                  @endif
                </td>
                <td>
                    {{ $receipt->bodyworkr->description ?? 'REPARACIÓN' }}<br><code>{{ $receipt->serial_number }}</code>
                </td>
                <td>{{ $receipt->formatted_retainer }}</td>
                <td>{{ $receipt->color }}</td>
                <td>{{ $receipt->observations }}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </color-box>
  </div>
</div>

@endsection
