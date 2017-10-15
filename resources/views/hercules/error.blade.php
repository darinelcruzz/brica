<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Grupo Brica'])
@show

<body class="hold-transition lockscreen">

    <div class="lockscreen-wrapper">

      <div class="error-page">
        <h2 class="headline text-red"><i class="fa fa-warning text-red"></i></h2>
      </div>

      <h3> ¡Ups! Algo anda mal.</h3>
      <p>
          Parece que no tienes los permisos para acceder a esta parte.
      </p>

      <a href="/{{ $company }}" class="btn btn-default pull-right">
          Ir a {{ ucfirst($company) }} &nbsp;
          <i class="fa fa-forward" aria-hidden="true"></i>
      </a>
      <br><br><br>
      <a href="/salir" class="btn btn-default pull-right">
          Intentar de nuevo &nbsp;
          <i class="fa fa-forward" aria-hidden="true"></i>
      </a>
  </div>

</body>
</html>
