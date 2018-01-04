@extends('runa')

@section('main-content')
	<div class="row">
		<div class="col-md-5">
			<solid-box title="Buscar" color="box-primary">
				{!! Form::open(['method' => 'POST', 'route' => 'runa.index']) !!}
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
			<data-table-com title="Ingresos"
		        example="example1" color="box-success">
		        <template slot="header">
		            <tr>
		                <th>Folio</th>
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
    						  <td>$ {{ $quotation->amount }}</td>
    		              </tr>
		              @endif
		            @endforeach

					@foreach ($sales as $sale)
						@if (date_format($sale->created_at, 'Y-m-d') === $date
								&& $sale->quotationr->type != 'terminado'
								&& $sale->quotationr->status != 'credito')
							<tr>
								<td>{{ $sale->quotationr->folio }}</td>
								<td>{{ $sale->quotationr->clientr->name }}</td>
								<td>{{ $sale->quotationr->type }}</td>
								<td>$ {{ $sale->amount - $sale->retainer }}</td>
							</tr>
							@php
								$totals['totalQ'] += $sale->amount - $sale->retainer;
							@endphp
						@endif
					@endforeach
		        </template>

				<template slot="footer">
					<tr>
						<td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ {{ number_format($totals['totalQ'], 2, '.', ',') }}</td>
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
						<td>$ {{ number_format($totals['totalE'], 2, '.', ',') }}</td>
					</tr>
				</template>
		    </data-table-com>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
  			<div class="small-box bg-green">
    			<div class="inner">
    				<p>Ingresos Totales</p>
      				<h3>$ {{ number_format($totals['totalQ'], 2, '.', ',') }}</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
    	</div>

    	<div class="col-md-4">
  			<div class="small-box bg-red">
    			<div class="inner">
    				<p>Egresos Totales</p>
      				<h3>$ {{ number_format($totals['totalE'], 2, '.', ',') }}</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
	    </div>

		<div class="col-md-4">
			<div class="small-box bg-primary">
				<div class="inner">
					<p>Ganancia</p>
					<h3>$ {{ number_format($totals['totalQ'] - $totals['totalE'], 2, '.', ',') }}</h3>
				</div>
				<div class="icon">
					<i class="fa fa-dollar"></i>
				</div>
			</div>
		</div>
    </div>
@endsection
