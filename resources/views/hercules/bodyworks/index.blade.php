@extends('hercules')

@section('main-content')

    <row-woc col="col-md-3">
        <a href="{{ route('hercules.bodywork.create', ['type' => 'redila']) }}" class="btn btn-app">
            <span class="badge bg-aqua">{{ count($bodyworks) }}</span>
            <i class="fa fa-truck"></i> AGREGAR
        </a>
    </row-woc>

    <data-table col="col-md-12" title="Redilas"
        example="example2" color="box-primary">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                <th>Descripción</th>
                <th>Medidas (alto x largo x ancho)</th>
                <th>Costo</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($bodyworks as $bodywork)
              <tr>
                  <td>{{ $bodywork->id }}</td>
                  <td>
                    <dropdown color="primary" icon="cogs">
                        <ddi to="{{ route('hercules.bodywork.show', $bodywork) }}" icon="eye" text="Detalles"></ddi>
                        <ddi to="{{ route('hercules.bodywork.edit', $bodywork) }}" icon="edit" text="Editar"></ddi>
                        <ddi to="{{ route('hercules.bodywork.clone', $bodywork) }}" icon="clone" text="Duplicar"></ddi>
                        <ddi to="{{ route('hercules.bodywork.clone', $bodywork) }}" icon="trash" text="Deshabilitar"></ddi>
                    </dropdown>
                  </td>
                  <td>{{ $bodywork->description }}</td>
                  <td>
                      {{ $bodywork->height }} m <i class="fa fa-times" aria-hidden="true"></i>
                      {{ $bodywork->length }} m <i class="fa fa-times" aria-hidden="true"></i>
                      {{ $bodywork->width }} m
                  </td>
                  <td>{{ '$ ' . number_format($bodywork->computeTotal(), 2, '.', ',') }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>

@endsection
