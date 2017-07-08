@extends('admin')

@section('main-content')

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
  			<div class="small-box bg-primary">
    			<div class="inner">
    				<p>Total</p>
      				<h3>${{ $date }}</h3>
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
		        example="example2" color="box-success">
		        <template slot="header">
		            <tr>
		                <th>ID</th>
		                <th>Cliente</th>
		                <th>Tipo</th>
		                <th>Monto</th>
		            </tr>
		        </template>

		        <template slot="body">
		            @foreach($sales as $row)
		              <tr>
		                  <td>{{ $row->id }}</td>
		                  <td>{{ $row->quotationr->clientr->name }}</td>
		                  <td>{{ $row->quotationr->type }}</td>
		                  <td>$ {{ $row->amount }}</td>
		              </tr>
		            @endforeach
		        </template>
		    </data-table-com>
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
  			<div class="small-box bg-green">
    			<div class="inner">
    				<p>Ingresos Totales</p>
      				<h3>$</h3>
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
      				<h3>$</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
	    </div>
    </div>
@endsection
