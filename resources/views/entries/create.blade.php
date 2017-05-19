@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="box box-primary box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Nueva entrada</h3>
				</div>

				<!-- form start -->
				{!! Form::open(['method' => 'POST', 'route' => 'entries.store']) !!}
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								{!! Field::number('quotation', ['tpl' => 'templates/withicon'],
								['icon' => 'envelope']) !!}
							</div>
							<div class="col-md-6">
								{!! Field::date('date', ['tpl' => 'templates/withicon'],
								['icon' => 'calendar']) !!}
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								{!! Field::select('provider', ['1' => 'Sommer', '2' => 'Cedeño', '3' => 'Fortacero'], null,
								['tpl' => 'templates/withicon', 'empty' => 'Selecciona el proveedor'],
								['icon' => 'handshake-o']) !!}
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								{!! Field::number('amount', ['tpl' => 'templates/withicon', 'step' => '0.01'],
								['icon' => 'dollar']) !!}
							</div>

							<div class="col-md-6">
								{!! Field::number('items', ['tpl' => 'templates/withicon'],
								['icon' => 'paper-plane-o']) !!}
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th width="30px">ID</th>
											<th width="20%">Cant.</th>
											<th width="30%">Cal</th>
											<th width="100px">Peso Esp</th>
											<th width="100px">Kg</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><label>1</label></td>
											<td>{!! Field::number('quantity', ['label' => '']) !!}</td>
											<td>
												{!! Field::select('caliber', 
												['16' => '16', '15' => '15', '14' => '14', '12' => '12', '10' => '10', '3/16' => '3/16"', '1/4' => '1/4"',  'ANT 12' => 'ANT 12', 'ANT 1/4' => 'ANT 1/4"']
												,null ,['label' => '']) !!}
											</td>
											<td>
												{!! Field::number('specific', 10, ['label' => '','disabled' => '']) !!}
											</td>
											<td>
												{!! Field::number('weight', 60, ['label' => '','disabled' => '']) !!}
											</td>
										</tr>
										<tr>
											<td><label>2</label></td>
											<td>{!! Field::number('quantity', ['label' => '']) !!}</td>
											<td>
												{!! Field::select('caliber', 
												['16' => '16', '15' => '15', '14' => '14', '12' => '12', '10' => '10', '3/16' => '3/16"', '1/4' => '1/4"',  'ANT 12' => 'ANT 12', 'ANT 1/4' => 'ANT 1/4"']
												,null ,['label' => '']) !!}
											</td>
											<td>
												{!! Field::number('specific', 10, ['label' => '','disabled' => '']) !!}
											</td>
											<td>
												{!! Field::number('weight', 80, ['label' => '','disabled' => '']) !!}
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-9">
						{!! Field::number('total_weight', 140, ['label' => 'Peso Total','disabled' => '', 'tpl' => 'templates/oneline']) !!}
					</div>


					<!-- /.box-body -->
					<div class="box-footer">
						{!! Form::submit('Agregar', ['class' => 'btn btn-primary btn-block']) !!}
					</div>
					<!-- /.box-footer -->

				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
