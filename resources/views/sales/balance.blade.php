@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-5">
			<solid-box title="Buscar" color="box-primary">
				{!! Form::open(['method' => 'POST', 'route' => 'quotation.cash']) !!}
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

		<div class="col-md-5 col-md-offset-1">
			<div class="small-box bg-primary">
				<div class="inner">
					<p>Ganancia</p>
					<h3>${{ $totals['totalQ'] - $totals['totalE'] }}</h3>
				</div>
				<div class="icon">
					<i class="fa fa-dollar"></i>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
			<data-table-com title="Ingresos"
		        example="example1" color="box-success">
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
		              <tr>
		                  <td>{{ $quotation->id }}</td>
		                  <td>{{ $quotation->clientr->name }}</td>
		                  <td>{{ $quotation->type }}</td>
						  @if ($quotation->type === 'produccion' && $quotation->status === 'pagado')
							  <td>
								  $ {{ $quotation->sale->amount }}
							  </td>
						  @else
							  <td>$ {{ $quotation->amount }}</td>
						  @endif
		              </tr>
		            @endforeach
		        </template>

				<template slot="footer">
					<tr>
						<td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ {{ $totals['totalQ'] }}</td>
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
		                  <td>$ {{ $expense->amount }}</td>
		              </tr>
		            @endforeach
		        </template>

				<template slot="footer">
					<tr>
						<td><b>Total:</b></td>
						<td>$ {{ $totals['totalE'] }}</td>
					</tr>
				</template>
		    </data-table-com>
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
  			<div class="small-box bg-green">
    			<div class="inner">
    				<p>Ingresos Totales</p>
      				<h3>${{ $totals['totalQ'] }}</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
    	</div>

    	<div class="col-md-5">
  			<div class="small-box bg-red">
    			<div class="inner">
    				<p>Egresos Totales</p>
      				<h3>${{ $totals['totalE'] }}</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
	    </div>
    </div>
@endsection
