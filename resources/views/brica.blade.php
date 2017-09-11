<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Grupo Brica'])
@show

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    Grupo<b>Brica</b>
  </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset('/img/logoruna.png') }}" alt="Runa">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <div class="lockscreen-credentials">
      <div class="input-group">
        <input type="text" class="form-control" value="RUNA" disabled>

        <div class="input-group-btn">
          <a href="/runa" class="btn"><i class="fa fa-arrow-right text-muted"></i></a>
        </div>
      </div>
    </div>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <br>
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset('/img/carrocerias.png') }}" alt="Hercules">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <div class="lockscreen-credentials">
      <div class="input-group">
        <input type="text" class="form-control" value="HERCULES" disabled>

        <div class="input-group-btn">
          <a href="/hercules" class="btn"><i class="fa fa-arrow-right text-muted"></i></a>
        </div>
      </div>
    </div>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->

  <div class="help-block text-center">
    Elija a qué sitio quiere dirigirse
  </div>
</div>
</body>
</html>
