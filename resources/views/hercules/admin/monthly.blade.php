@extends('hercules')

@section('main-content')

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
					@foreach($stocksales as $stocksale)
						<tr>
							<td>{{ $stocksale->id }}</td>
							<td>{{ $stocksale->name }}</td>
							<td>P. Terminado</td>
							<td>{{ $stocksale->amount }}</td>
						</tr>
						@php
							$totalI += $stocksale->total;
						@endphp
					@endforeach
					@foreach($receipts as $receipt)
						@if ($receipt->balance)
							<tr>
								<td>{{ $receipt->id }}</td>
								<td>{{ $receipt->name }}</td>
								<td>Carrocerías</td>
								<td>{{ '$ ' . number_format($receipt->balance, 2) }}</td>
							</tr>
						@endif
						@php
							$totalI += $receipt->balance;
						@endphp
					@endforeach
					@foreach($deposits as $deposit)
						@if (true)
							<tr>
								<td>{{ $deposit->id }}</td>
								<td>{{ $deposit->client }}</td>
								<td>Abono</td>
								<td>{{ '$ ' . number_format($deposit->amount, 2) }}</td>
							</tr>
							@php
								$totalI += $deposit->amount;
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
