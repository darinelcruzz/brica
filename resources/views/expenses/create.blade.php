@extends('admin')

@section('main-content')
	
	<div class="row">
		<div class="col-md-4">
			<div class="box box-solid box-primary">
		        <div class="box-header with-border">
		            <h3 class="box-title">Agrear Gasto</h3>
		        </div>
				{!! Form::open(['method' => 'POST', 'route' => 'expense.store']) !!}
					<div class="box-body">

						<div class="row">
				            <div class="col-md-10 col-md-offset-1">
								{!! Field::text('description',['tpl' => 'templates/withicon'], ['icon' => 'edit']) !!}
							</div>
						</div>
						<div class="row">
				            <div class="col-md-6 col-md-offset-3">
								{!! Field::number('amount',['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '1'], ['icon' => 'dollar']) !!}
							</div>
						</div>
						<div class="row">
				            <div class="col-md-12">
								{!! Form::submit('Agregar', ['class' => 'btn btn-primary btn-block']) !!}
							</div>
							
							{!! Field::hidden('date', $today) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection