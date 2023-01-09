@extends('hercules')

@section('main-content')

	<div class="row">
		<div class="col-md-4">
			<solid-box title="Agregar gasto" color="box-primary">
				{!! Form::open(['method' => 'POST', 'route' => 'hercules.balance.createExpense']) !!}
					
					{!! Field::text('description', ['tpl' => 'templates/withicon', 'ph' => 'Gasolina para...'], ['icon' => 'edit']) !!}
					{!! Field::number('amount', 0, ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '1'], ['icon' => 'dollar']) !!}
					{!! Field::hidden('date', $date) !!}
					<br>
					{!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
					
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
