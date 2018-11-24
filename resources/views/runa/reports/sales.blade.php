@extends('runa')

@section('main-content')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<simple-box title="Elegir rango" color="warning">
				{!! Form::open(['method' => 'POST', 'route' => 'runa.report.sales']) !!}
					<div class="row">
						<div class="col-md-3">
							{!! Field::select('mode', ['n' => 'Normal', 'm' => 'Mensual'], ['n'],
								['label' => 'Modo', 'tpl' => 'templates/withicon', 'empty' => false, 'v-model' => 'report_mode'],
								['icon' => 'arrows']) !!}
						</div>

						<template v-if="report_mode == 'n'">
							<div class="col-md-4">
								{!! Field::date('startDate', date('Y-m-d', strtotime($dates['start'])), ['tpl' => 'templates/withicon'],
									['icon' => 'calendar-o']) !!}
							</div>
							<div class="col-md-4">
								{!! Field::date('endDate', date('Y-m-d', strtotime($dates['end'])), ['tpl' => 'templates/withicon'],
									['icon' => 'calendar']) !!}
							</div>
						</template>

						<template v-else>
							<div class="col-md-4">
								<label>De</label>
								<div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			                        <input name="startDate" type="month" class="form-control" value="{{ date('Y-m', time() - 30*24*60*60) }}">
			                    </div>
			                </div>
			                <div class="col-md-4">
			                	<label>A</label>
								<div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
			                        <input name="endDate" type="month" class="form-control" value="{{ date('Y-m') }}">
			                    </div>
							</div>
						</template>


						<div class="col-md-1">
							<br>
							<button type="submit" class='btn btn-warning pull-right'>
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>

				{!! Form::close() !!}

			</simple-box>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12" align="center">
			{!! $salesChart->render() !!}
		</div>
	</div>
@endsection
