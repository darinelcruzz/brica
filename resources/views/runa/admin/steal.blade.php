@extends('runa')

@section('main-content')

	<div class="row">
		<div class="col-md-12">
			<data-table-com title="Ventas 10 a.m. - 11 a.m." example="example1" color="box-warning">
				<template slot="header">
					<tr>
						<th>ID</th>
						<th>Cliente</th>
						<th>Hora</th>
						<th>Fecha</th>
                        <th>Total</th>
					</tr>
				</template>

				<template slot="body">
					@foreach($sales as $sale)
                        @if (fdate($sale->created_at, 'H') == '10')
                            <tr>
                                <td>
                                    <a href="{{ route('runa.quotation.details', ['id' => $sale->quotation]) }}">
                                        {{ $sale->quotation }}
                                    </a>
                                </td>
                                <td>{{ $sale->quotationr->clientr->name }}</td>
                                <td>{{ fdate($sale->created_at, 'h:i:s a') }}</td>
                                <td>{{ fdate($sale->created_at, 'l, d \d\e M') }}</td>
                                <td>$ {{ number_format($sale->amount, 2) }}</td>
    						</tr>
                        @endif
					@endforeach
				</template>
			</data-table-com>
		</div>
@endsection
