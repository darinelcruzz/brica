@extends('runa')

@section('main-content')

	@include('runa.admin.monthselector')

	<div class="row">
		<div class="col-md-7">
			<data-table-com title="Ingresos" example="example1" color="box-success">
				<template slot="header">
					<tr>
						<th>ID</th>
						<th>Cliente</th>
						<th>Tipo</th>
						<th>Monto</th>
					</tr>
				</template>

				<template slot="body">
					@foreach($quotations as $quotation)
                        @if ($quotation->amount)
                            <tr>
    							<td>{{ $quotation->folio }}</td>
    							<td>{{ $quotation->clientr->name }}</td>
    							<td>{{ $quotation->type }}</td>
    							<td>$ {{ number_format($quotation->amount, 2) }}</td>
    						</tr>
    						@php
    							$totalI += $quotation->amount;
    						@endphp
                        @endif
					@endforeach

					@foreach($cuts as $cut)
                        <tr>
							<td>{{ $cut->id }}</td>
							<td>N/A</td>
							<td>CORTE SIMPLE</td>
							<td>$ {{ number_format($cut->amount, 2) }}</td>
						</tr>
						@php
							$totalI += $cut->amount;
						@endphp                        
					@endforeach

					@foreach ($sales as $sale)
						@if (date_format($sale->created_at, 'Y-m') === $date
								&& $sale->quotationr->type != 'terminado'
								&& $sale->quotationr->status != 'credito')
							<tr>
								<td>{{ $sale->quotationr->folio }}</td>
								<td>{{ $sale->quotationr->clientr->name }}</td>
								<td>{{ $sale->quotationr->type }}</td>
								<td>$ {{ $sale->amount - $sale->retainer }}</td>
							</tr>
							@php
								$totalI += $sale->amount - $sale->retainer;
							@endphp
						@endif
					@endforeach
				</template>

				<template slot="footer">
					<tr>
						<td colspan="2"></td>
						<td><b>Total:</b></td>
						<td>{{ '$ ' . number_format($totalI, 2) }}</td>
					</tr>
				</template>
			</data-table-com>
		</div>

		<div class="col-md-5">
			<data-table-com title="Egresos"
				example="example3" color="box-danger">
				<template slot="header">
					<tr>
						<th>Producto</th>
						<th>Monto</th>
					</tr>
				</template>

				<template slot="body">
					@foreach($expenses as $expense)
					  <tr>
						  <td>{{ $expense->description }}</td>
						  <td>{{ '$ ' . number_format($expense->amount, 2) }}</td>
					  </tr>
					  @php
						  $totalE += $expense->amount;
					  @endphp
					@endforeach
				</template>

				<template slot="footer">
					<tr>
						<td><b>Total:</b></td>
						<td>{{ '$ ' . number_format($totalE, 2) }}</td>
					</tr>
				</template>
			</data-table-com>
		</div>
	</div>

	<div class="row">
		<little-box color="bg-green" size="col-md-4" icon="fa fa-dollar">
			<p>Ingresos Totales</p>
			<h3>{{ '$ ' . number_format($totalI, 2) }}</h3>
		</little-box>

		<little-box color="bg-red" size="col-md-4" icon="fa fa-dollar">
			<p>Egresos Totales</p>
			<h3>{{ '$ ' . number_format($totalE, 2) }}</h3>
		</little-box>

		<little-box color="bg-primary" size="col-md-4" icon="fa fa-dollar">
			<p>Ganancia</p>
			<h3>{{ '$ ' . number_format($totalI - $totalE, 2) }}</h3>
		</little-box>
	</div>

@endsection
