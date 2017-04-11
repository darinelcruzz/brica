@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['methhod' => 'POST', 'route' => 'entries.create']) !!}
                {!! Field::number('quotation') !!}
                {!! Field::number('weight') !!}
                {!! Field::number('items') !!}
                {!! Field::text('date') !!}
                {!! Field::number('amount') !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
