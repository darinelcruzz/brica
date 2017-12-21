@extends('hercules')

@section('main-content')

	@include('hercules.components.monthselector')

	<div class="row">
		<div class="col-md-7">
			<data-table-com title="Ingresos" example="example1" color="box-success">
				<template slot="header">
					<tr>
						<th>#</th>
						<th>Trabajo</th>
						<th>Estado</th>
						<th>Monto</th>
					</tr>
				</template>

				<template slot="body">
					@foreach($stocksales as $stocksale)
						<tr>
							<td>{{ $stocksale->id }}</td>
							<td>{{ $stocksale->name }}</td>
							<td>
								P. Terminado <br>
								{{ fdate($stocksale->created_at, 'd, M') }}
							</td>
							<td>{{ $stocksale->amount }}</td>
						</tr>
						@php
							$totalI += $stocksale->total;
						@endphp
					@endforeach
					@foreach($retainers as $receipt)
						@if ($receipt->retainer > 0)
							<tr>
								<td>{{ $receipt->id }}</td>
								<td>{{ $receipt->name }}</td>
								<td>
									Anticipo <br>
									{{ fdate($receipt->date, 'd, M') }}
								</td>
								<td>{{ '$ ' . number_format($receipt->retainer, 2) }}</td>
							</tr>
						@endif
						@php
							$totalI += $receipt->retainer;
						@endphp
					@endforeach
					@foreach($paid as $receipt)
						@if ($receipt->retainer != $receipt->amount)
							<tr>
								<td>{{ $receipt->id }}</td>
								<td>{{ $receipt->name }}</td>
								<td>
									{{ ucfirst($receipt->status) }}<br>
									{{ fdate($receipt->date, 'd, M') }}
								</td>
								<td>{{ '$ ' . number_format($receipt->amount - $receipt->retainer, 2) }}</td>
							</tr>
						@endif
						@php
							$totalI += $receipt->amount - $receipt->retainer;
						@endphp
					@endforeach
					@foreach($deposits as $deposit)
						<tr>
							<td>{{ $deposit->id }}</td>
							<td>{{ $deposit->client }}</td>
							<td>
								Abono <br>
								{{ fdate($deposit->created_at, 'd, M') }}
							</td>
							<td>{{ '$ ' . number_format($deposit->amount, 2) }}</td>
						</tr>
						@php
							$totalI += $deposit->amount;
						@endphp
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
