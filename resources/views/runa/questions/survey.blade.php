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
      <h1 class="title">
        Title
      </h1>
      <h2 class="subtitle">
        Subtitle
      </h2>
    </div>
  </div>
</section>

@endsection
