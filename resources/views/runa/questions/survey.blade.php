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

      @foreach ($questions as $question)
          <h1 class="title">{{ $question->body }}</h1>
          @foreach ($question->all_answers as $key => $value)
              <input type="radio" name="{{ $question->id }}" value="1">
              <span class="icon is-medium">
                  <i class="{{ $icons[$question->type][$key] }}" aria-hidden="true"></i>
              </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          @endforeach
          <hr>
      @endforeach

    </div>
  </div>
</section>

@endsection
