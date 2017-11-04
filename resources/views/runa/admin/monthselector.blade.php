<row-woc col="col-md-5">
    <solid-box title="Fecha">
        {!! Form::open(['method' => 'POST', 'route' => 'runa.monthly']) !!}
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                        <input name="date" type="month" class="form-control" value="{{ $date }}">
                    </div>
                </div>
            </div>

            <div class="box-footer">
                {!! Form::submit('Buscar', ['class' => 'btn btn-primary pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </solid-box>
</row-woc>
