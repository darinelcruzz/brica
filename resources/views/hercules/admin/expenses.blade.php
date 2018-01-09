@extends('hercules')

@section('main-content')

	<div class="row">
		<div class="col-md-4">
			<solid-box title="Agregar gasto" color="box-primary">
				{!! Form::open(['method' => 'POST', 'route' => 'hercules.balance.createExpense']) !!}
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							{!! Field::text('description',['tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							{!! Field::number('amount',['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '1'], ['icon' => 'dollar']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							{!! Form::submit('Agregar', ['class' => 'btn btn-primary btn-block']) !!}
						</div>

						{!! Field::hidden('date', $date) !!}
					</div>
				{!! Form::close() !!}
			</solid-box>
		</div>

		<div class="col-md-8">
			<data-table-com title="Historial de gastos"
				example="example1" color="box-primary">
				<template slot="header">
					<tr>
						<th>ID</th>
						<th>Descripción</th>
						<th>Monto</th>
						<th>Fecha</th>
					</tr>
				</template>

				<template slot="body">
					@foreach($expenses as $expense)
					  <tr>
						  <td>{{ $expense->id }}</td>
						  <td>{{ $expense->description }}</td>
						  <td>$ {{ $expense->amount }}</td>
						  <td>{{ $expense->created_at->format('d/m/Y') }}</td>
					  </tr>
					@endforeach
				</template>
			</data-table-com>
		</div>
	</div>

@endsection
