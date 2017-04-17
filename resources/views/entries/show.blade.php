@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
  			<h2>Historial Entradas</h2>
  			<p></p>
			<table class="table table-striped">
				<thead>
					<tr>
				       	<th>Cot</th>
				        <th>Proveedor</th>
				        <th>Peso</th>
				        <th>Fecha</th>
				        <th>Importe
				    </tr>
				</thead>
				<tbody>
					@foreach($entries as $entry)
				      <tr>
				        <td>{{ $entry->quotation }}</td>
				        <td>{{ $entry->provider }}</td>
				        <td>{{ $entry->weight }}</td>
				        <td>{{ $entry->date }}</td>
				        <td>{{ $entry->amount }}</td>
				      </tr>
				    @endforeach
				</tbody>
			</table>
        </div>
    </div>
@endsection