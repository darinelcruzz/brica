@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-4">
			<div class="box box-solid box-primary">
		        <div class="box-header with-border">
		            <h3 class="box-title">Buscar</h3>
		        </div>
				{!! Form::open(['method' => 'POST', 'route' => 'quotation.cash']) !!}
					<div class="box-body">
						<div class="row">
				            <div class="col-md-10 col-md-offset-1">
								{!! Field::date('date', $today, ['tpl' => 'templates/withicon'], 
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
      @include('table', ['rows' => $paid, 'total' => $totalP, 'size' => '6',
        'header' => ['#', 'Cliente', 'Tipo','Monto'],
        'color' => 'success', 'title' => 'Ingresos', 'example' => '1'])

      @include('table', ['rows' => $expenses, 'total' => $totalE, 'size' => '6',
        'header' => ['Producto','Monto'],
        'color' => 'danger', 'title' => 'Egresos', 'example' => '2'])
    </div>
@endsection