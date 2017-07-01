<td>
    {!! Form::open(['method' => 'POST', 'route' => 'production.assign']) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="input-group">
            {!! Field::select('team', ['R1'=>'R1', 'R2'=>'R2', 'R3'=>'R3'], null) !!}
            <button type="submit" name="button" class="btn btn-success">
                <i class="fa fa-check"></i>
            </button>
        </div>
    {!! Form::close() !!}
</td>
