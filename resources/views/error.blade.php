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
          Parece que no tienes los permisos para acceder a esta parte del sitio.
      </p>
  </div>

</body>
</html>
