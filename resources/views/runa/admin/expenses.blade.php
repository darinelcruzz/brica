@extends('runa')

@section('main-content')

	<div class="row">
		<div class="col-md-4">
			<solid-box title="Agregar gasto" color="box-primary">
				{!! Form::open(['method' => 'POST', 'route' => 'runa.expenses']) !!}
					{!! Field::text('description', ['tpl' => 'templates/withicon', 'ph' => 'Gasolina...'], ['icon' => 'comments']) !!}
					{!! Field::number('amount', 0, ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '0.01'], ['icon' => 'dollar']) !!}
					{!! Field::hidden('date', $date) !!}
					<br>
					{!! Form::submit('AGREGAR', ['class' => 'btn btn-primary pull-right']) !!}
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
						<th>Fecha</th>
						<th>Monto</th>
					</tr>
				</template>

				<template slot="body">
					@foreach($expenses as $expense)
					  <tr>
						  <td>{{ $expense->id }}</td>
						  <td>{{ $expense->description }}</td>
						  <td>{{ $expense->created_at->format('d/m/Y') }}</td>
						  <td style="text-align: right;">{{ number_format($expense->amount, 2) }}</td>
					  </tr>
					@endforeach
				</template>
			</data-table-com>
		</div>
	</div>

@endsection
