@extends('hercules')

@section('main-content')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<simple-box title="Elegir rango" color="primary">
				{!! Form::open(['method' => 'POST', 'route' => 'hercules.report.bodyworks']) !!}
					<div class="row">
						<div class="col-md-3">
							{!! Field::select('mode', ['m' => 'Mensual'], ['m'],
								['label' => 'Modo', 'tpl' => 'templates/withicon', 'empty' => false],
								['icon' => 'arrows']) !!}
						</div>

						<div class="col-md-4">
							{!! Field::date('startDate', $dates['start'], ['tpl' => 'templates/withicon'],
								['icon' => 'calendar-o']) !!}
						</div>

						<div class="col-md-4">
							{!! Field::date('endDate', $dates['end'], ['tpl' => 'templates/withicon'],
								['icon' => 'calendar']) !!}
						</div>

						<div class="col-md-1">
							<br>
							<button type="submit" class='btn btn-primary pull-right'>
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>

				{!! Form::close() !!}

			</simple-box>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div align="center">
				{!! $chart->render() !!}
			</div>
		</div>
	</div>
@endsection