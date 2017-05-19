@php
use Jenssegers\Date\Date;
Date::setLocale('es');
@endphp

@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Historial de ordenes</h3>
                </div>
                
                <div class="box-body">
                    <table class="table table-striped">
        				<thead>
        					<tr>
                                <th>#</th>
        				       	<th>Equipo</th>
        				        <th>Descripción</th>
                                <th>Status</th>
        				        <th>Fecha Inicio</th>
        				    </tr>
        				</thead>
        				<tbody>
        					@foreach($orders as $order)
        				      <tr>
                                <td>{{ $order->id }}</td>
        				        <td>{{ $order->team }}</td>
        				        <td>{{ $order->description }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ Date::parse($order->created_at)->format('l j \d\e F\, Y') }}</td>
        				      </tr>
        				    @endforeach
        				</tbody>
        			</table>
                </div>
            </div>
        </div>
    </div>
@endsection
