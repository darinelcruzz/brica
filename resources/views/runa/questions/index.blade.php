@extends('runa')

@section('main-content')

    <row-woc col="col-md-6">
        <solid-box title="Preguntas" color="box-warning">
            @foreach ($questions as $question)
                <h4>{{ $question->body }}</h4>
                @foreach ($question->all_answers as $key => $value)
                    <input type="radio" name="{{ $question->id }}" value="1">
                    <i class="{{ $icons[$question->type][$key] }}" aria-hidden="true">
                    </i>&nbsp;&nbsp;
                @endforeach
                <br><hr>
            @endforeach
        </solid-box>
    </row-woc>

@endsection
