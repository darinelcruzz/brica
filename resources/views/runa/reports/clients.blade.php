@extends('runa')

@section('main-content')

	{!! Form::open(['method' => 'POST', 'route' => 'runa.report.clients']) !!}
	<row-woc col="col-md-10 col-md-offset-1">
		<div class="row">
			<div class="col-md-6">
				{!! Field::date('startDate', $dates['start'], ['tpl' => 'templates/withicon'],
					['icon' => 'calendar-o']) !!}
			</div>

			<div class="col-md-6">
				{!! Field::date('endDate', $dates['end'], ['tpl' => 'templates/withicon'],
					['icon' => 'calendar']) !!}
			</div>
		</div>
		{!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-xs pull-right']) !!}
	</row-woc>
	{!! Form::close() !!}

	<hr>

	<div class="row">
		<div class="col-md-12" align="center">
			{!! $clientsChart->render() !!}
		</div>
	</div>
@endsection
