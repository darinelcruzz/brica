@extends('runa')

@section('main-content')

	{!! Form::open(['method' => 'POST', 'route' => 'runa.report.teams']) !!}
	<row-woc col="col-md-10 col-md-offset-1">
		<div class="row">
			<div class="col-md-6">
				{!! Field::date('startDate', date('Y-m-d', strtotime($dates['start'])), ['tpl' => 'templates/withicon'],
					['icon' => 'calendar-o']) !!}
			</div>

			<div class="col-md-6">
				{!! Field::date('endDate', date('Y-m-d', strtotime($dates['end'])), ['tpl' => 'templates/withicon'],
					['icon' => 'calendar']) !!}
			</div>
		</div>
		<button type="submit" class='btn btn-xs btn-warning pull-right'>
			<i class="fa fa-search"></i>&nbsp;Buscar
		</button>
	</row-woc>
	{!! Form::close() !!}

	<hr>

	<div class="row">
		<div class="col-md-6">
			{!! $money->render() !!}
		</div>

		<div class="col-md-6">
			{!! $works->render() !!}
		</div>
	</div>
<hr>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! $weights->render() !!}
		</div>
	</div>
@endsection
