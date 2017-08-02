@extends('layouts.bulma', ['enterprise' => 'Runa'])

@section('main-content')

<section class="hero is-light is-medium">
  <!-- Hero header: will stick at the top -->
  <div class="hero-head">
    <header class="nav">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item">
            <img src="{{ asset('/img/logoruna.png') }}" alt="Logo">
          </a>
        </div>
      </div>
    </header>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
        {!! Form::open(['method' => 'POST', 'route' => 'runa.question.survey']) !!}
          @foreach ($questions as $question)
              <h1 class="title">{{ $question->body }}</h1>
              @foreach ($question->all_answers as $key => $value)
                  <input type="radio" class="radio_item" name="{{ $question->id }}" value="{{ $key }}" id="{{ $question->id }}_{{ $key }}">
                  <label class="label_item" for="{{ $question->id }}_{{ $key }}">
                      <span class="icon is-large">
                          <i class="{{ $icons[$question->type][$key] }}" aria-hidden="true"></i>
                      </span>
                  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              @endforeach
              <hr>
          @endforeach

          {!! Form::submit('Terminar', ['class' => 'button is-dark is-large']) !!}
        {!! Form::close() !!}
    </div>
  </div>
</section>

@endsection
