@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-3">
			<div class="box box-solid box-primary">
		        <div class="box-header with-border">
		            <h3 class="box-title">Buscar</h3>
		        </div>
				{!! Form::open(['method' => 'POST', 'route' => 'quotation.cash']) !!}
					<div class="box-body">
						<div class="row">
				            <div class="col-md-10 col-md-offset-1">
								{!! Field::date('date', $date,['tpl' => 'templates/withicon'], 
								['icon' => 'calendar-check-o']) !!}
							</div>
						</div>
                        <div class="row">
				            <div class="col-md-12">
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-block']) !!}
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
  			<div class="small-box bg-primary">
    			<div class="inner">
    				<p>Total</p>
      				<h3>${{ $total }}</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
	      		@include('table', ['rows' => $paid, 'size' => '12',
	        		'header' => ['#', 'Cliente', 'Tipo','Monto'],
	        		'color' => 'success', 'title' => 'Ingresos', 'example' => '1'])
	    		<div class="row">
	    			<div class="col-md-6">
	          			<div class="small-box bg-green">
	            			<div class="inner">
	            				<p>Ingresos Totales</p>
	              				<h3>${{ $totalP }}</h3>
	            			</div>
	            			<div class="icon">
	              				<i class="fa fa-dollar"></i>
	            			</div>
	          			</div>
	        		</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-6">
			<div class="row">
	      		@include('table', ['rows' => $expenses, 'size' => '12',
	        		'header' => ['Producto','Monto'],
	        		'color' => 'danger', 'title' => 'Egresos', 'example' => '2'])
	        	<div class="row">
	        		<div class="col-md-6 col-md-offset-6">
	          			<div class="small-box bg-red">
	            			<div class="inner">
	            				<p>Egresos Totales</p>
	              				<h3>${{ $totalE }}</h3>
	            			</div>
	            			<div class="icon">
	              				<i class="fa fa-dollar"></i>
	            			</div>
	          			</div>
	        		</div>
	    		</div>
	    	</div>
	    </div>
    </div>
@endsection