<td>
    {!! Form::open(['method' => 'POST', 'route' => 'production.assign']) !!}
        <input type="hidden" name="id" value="{{ $id }}">

        {!! Field::select('team', ['R1'=>'R1', 'R2'=>'R2', 'R3'=>'R3'], null,
            ['tpl' => 'templates/inlinebutton']) !!}
    {!! Form::close() !!}
</td>