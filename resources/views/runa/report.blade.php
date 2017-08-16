@extends('runa')

@section('main-content')

	{!! Form::open(['method' => 'POST', 'route' => 'runa.report']) !!}
	<row-woc col="col-md-10 col-md-offset-1">
		<div class="row">
			<div class="col-md-6">
				{!! Field::date('startDate', $startDate, ['tpl' => 'templates/withicon'],
					['icon' => 'calendar-o']) !!}
			</div>

			<div class="col-md-6">
				{!! Field::date('endDate', $endDate, ['tpl' => 'templates/withicon'],
					['icon' => 'calendar']) !!}
			</div>
		</div>
		{!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-xs pull-right']) !!}
	</row-woc>
	{!! Form::close() !!}

	<hr>
	{{ $startDate }} ----- {{ $endDate }} <br>
	{{ $quotations[1] }}
	<hr>

	<row-woc col="col-md-10 col-md-offset-1">
		{!! $chart->render() !!}
	</row-woc>
@endsection
