@extends('hercules')

@section('main-content')
<div class="row">
	<div class="col-md-5">
		<solid-box title="Buscar" color="box-primary">
			{!! Form::open(['method' => 'POST', 'route' => 'hercules.balance.index']) !!}
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						{!! Field::date('date', $date, ['tpl' => 'templates/withicon'],
							['icon' => 'calendar-check-o']) !!}
						{!! Form::submit('Buscar', ['class' => 'btn btn-primary pull-right']) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</solid-box>
	</div>
</div>

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
						<td>Terminado</td>
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
							<td>Producción</td>
							<td>{{ '$ ' . number_format($receipt->retainer, 2) }}</td>
						</tr>
					@endif
					@php
						$totalI += $receipt->retainer;
					@endphp
				@endforeach
				{{-- @foreach($paid as $receipt)
					<tr>
						<td>{{ $receipt->id }}</td>
						<td>{{ $receipt->name }}</td>
						<td>Producción</td>
						<td>{{ '$ ' . number_format($receipt->amount - $receipt->retainer, 2) }}</td>
					</tr>
					@php
						$totalI += $receipt->amount - $receipt->retainer;
					@endphp
				@endforeach --}}
				@foreach($deposits as $deposit)
					@if($deposit->receiptr->order->status != 'pagado')
						<tr>
							<td>{{ $deposit->id }}</td>
							<td>{{ $deposit->client }}</td>
							<td>Abono</td>
							<td>{{ '$ ' . number_format($deposit->amount, 2) }}</td>
						</tr>
						@php
							$totalI += $deposit->amount;
						@endphp
					@else
						<tr>
							<td>{{ $deposit->receiptr->id }}</td>
							<td>{{ $deposit->client }}</td>
							<td>Abono</td>
							<td>{{ '$ ' . number_format($deposit->receiptr->deposit - $deposit->receipt->retainer, 2) }}</td>
						</tr>
						@php
							$totalI += $deposit->receiptr->deposit - $deposit->receipt->retainer;
						@endphp
					@endif
				@endforeach
				@foreach($gdeposits as $gdeposit)
					@if (true)
						<tr>
							<td>{{ $gdeposit->id }}</td>
							<td>{{ $gdeposit->gondola->client->name }}</td>
							<td>{{ ucfirst($gdeposit->description) }}</td>
							<td>{{ '$ ' . number_format($gdeposit->amount, 2) }}</td>
						</tr>
						@php
							$totalI += $gdeposit->amount;
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
			example="example2" color="box-danger">
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
