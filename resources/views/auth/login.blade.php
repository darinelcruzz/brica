<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Grupo Brica'])
@show

<body class="hold-transition login-page">
        <div class="login-box">

            <div class="login-box-body">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" align="center" valign="middle">
                        @if (strpos(session('url.intended'), 'hercules') === false)
                            <img width="100%" height="100%" src="{{ asset('/img/logoruna.png') }}">
                        @else
                            <img width="100%" height="100%" src="{{ asset('/img/carrocerias.png') }}">
                        @endif
                    </div>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'login', 'class' => 'form-horizontal']) !!}

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        {!! Field::text('email',
                            ['label' => 'Usuario', 'value' => old('user'), 'tpl' => 'templates/withicon'],
                            ['icon' => 'user-circle']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        {!! Field::password('password',
                            ['tpl' => 'templates/withicon'], ['icon' => 'key']) !!}
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        @if (request()->site == 'r')
                            {!! Form::submit('Entrar', ['class' => 'btn btn-warning btn-block']) !!}
                        @else
                            {!! Form::submit('Entrar', ['class' => 'btn btn-success btn-block']) !!}
                        @endif
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</body>

</html>
