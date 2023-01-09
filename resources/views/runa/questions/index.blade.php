@extends('runa')

@section('main-content')

    <row-woc col="col-md-6">
        <solid-box title="Preguntas" color="box-warning">
            @foreach ($questions as $question)
                <h4>{{ $question->body }}
                <a href="{{ route('runa.question.edit', $question)}}">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                </a>
                </h4>
                @foreach ($question->all_answers as $key => $value)
                    <i class="{{ $icons[$question->type][$key] }}" aria-hidden="true">
                    </i>
                    <code>{{ $value }}</code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
                <br><hr>
            @endforeach
        </solid-box>
    </row-woc>

@endsection
