@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Historial de entradas</h3>
                </div>

                <div class="box-body">
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
        </div>
    </div>
@endsection
