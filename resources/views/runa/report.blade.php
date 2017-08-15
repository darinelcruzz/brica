@extends('runa')

@section('main-content')
	<div class="row">
		<div class="col-md-6">
			{!! $chart->render() !!}
		</div>
	</div>
@endsection
