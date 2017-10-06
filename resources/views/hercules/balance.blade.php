@extends('hercules')

@section('main-content')
<div class="row">
	<div class="col-md-5">
		<solid-box title="Buscar" color="box-primary">
			{!! Form::open(['method' => 'POST', 'route' => 'hercules.balance']) !!}
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
						$totalIncome += $stocksale->total;
					@endphp
				@endforeach
				@foreach($receipts as $receipt)
					<tr>
						<td>{{ $receipt->id }}</td>
						<td>{{ $receipt->name }}</td>
						<td>Producción</td>
						<td>{{ '$ ' . number_format($receipt->balance, 2) }}</td>
					</tr>
					@php
						$totalIncome += $receipt->balance;
					@endphp
				@endforeach
			</template>

			<template slot="footer">
				<tr>
					<td colspan="2"></td>
					<td><b>Total:</b></td>
					<td>{{ '$ ' . number_format($totalIncome, 2) }}</td>
				</tr>
			</template>
		</data-table-com>
	</div>
</div>

@endsection
