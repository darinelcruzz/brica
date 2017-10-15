@extends('hercules')

@section('main-content')

	<row-woc col="col-md-10 col-md-offset-1">
        {!! Form::open(['method' => 'POST', 'route' => 'hercules.report.sales']) !!}
		<div class="row">
			<div class="col-md-6">
				{!! Field::date('startDate', $dates['start'], ['tpl' => 'templates/withicon'], ['icon' => 'calendar-o']) !!}
			</div>

			<div class="col-md-6">
				{!! Field::date('endDate', $dates['end'], ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
			</div>
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-xs pull-right']) !!}
		</div>
        {!! Form::close() !!}
	</row-woc>

	<hr>

	<div class="row">
		<div align="center">
			{!! $chart->render() !!}
		</div>
	</div>
@endsection
