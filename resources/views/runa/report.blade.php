@extends('runa')

@section('main-content')
	<div class="row">
		<div class="col-md-5">
			<solid-box title="Buscar" color="box-primary">
				{!! Form::open(['method' => 'POST', 'route' => 'runa.cash']) !!}
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
		<div class="col-md-6">
			<data-table-com title="H1"
		        example="example2" color="box-success">
		        <template slot="header">
		            <tr>
		                <th>Cotización</th>
		                <th>Monto</th>
		            </tr>
		        </template>

		        <template slot="body">
		            @foreach($r1 as $quotation)
		              @if ($quotation->amount)
						  <tr>
    		                  <td>{{ $quotation->id }}</td>
    						  <td>$ {{ $quotation->retainer }}</td>
    		              </tr>
		              @endif
		            @endforeach
		        </template>

				<template slot="footer">
					<tr>
						<td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ {{-- number_format($totals['totalQ'], 2, '.', ',') --}}</td>
					</tr>
				</template>
		    </data-table-com>
		</div>

		<div class="col-md-6">
			<data-table-com title="H2"
		        example="example1" color="box-warning">
		        <template slot="header">
		            <tr>
		                <th>Cotización</th>
		                <th>Monto</th>
		            </tr>
		        </template>

		        <template slot="body">
		            @foreach($r2 as $quotation)
		              @if ($quotation->amount)
						  <tr>
    		                  <td>{{ $quotation->id }}</td>
    						  <td>$ {{ $quotation->retainer }}</td>
    		              </tr>
		              @endif
		            @endforeach
		        </template>

				<template slot="footer">
					<tr>
						<td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ {{-- number_format($totals['totalQ'], 2, '.', ',') --}}</td>
					</tr>
				</template>
		    </data-table-com>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<data-table-com title="H3"
		        example="example3" color="box-primary">
		        <template slot="header">
		            <tr>
		                <th>Cotización</th>
		                <th>Monto</th>
		            </tr>
		        </template>

		        <template slot="body">
		            @foreach($r3 as $quotation)
		              @if ($quotation->amount)
						  <tr>
    		                  <td>{{ $quotation->id }}</td>
    						  <td>$ {{ $quotation->retainer }}</td>
    		              </tr>
		              @endif
		            @endforeach
		        </template>

				<template slot="footer">
					<tr>
						<td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ {{-- number_format($totals['totalQ'], 2, '.', ',') --}}</td>
					</tr>
				</template>
		    </data-table-com>
		</div>

		<div class="col-md-6">
			<data-table-com title="H4"
		        example="example4" color="box-danger">
		        <template slot="header">
		            <tr>
		                <th>Cotización</th>
		                <th>Monto</th>
		            </tr>
		        </template>

		        <template slot="body">
		            @foreach($r4 as $quotation)
		              @if ($quotation->amount)
						  <tr>
    		                  <td>{{ $quotation->id }}</td>
    						  <td>$ {{ $quotation->retainer }}</td>
    		              </tr>
		              @endif
		            @endforeach
		        </template>

				<template slot="footer">
					<tr>
						<td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ {{-- number_format($totals['totalQ'], 2, '.', ',') --}}</td>
					</tr>
				</template>
		    </data-table-com>
		</div>
	</div>
@endsection
