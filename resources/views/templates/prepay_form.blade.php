<td>
    {!! Form::open(['method' => 'POST', 'route' => 'order.pay']) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        {!! Field::number('advance',
            ['tpl' => 'templates/inlinebutton', 'ph' => '$0.00', 'min' => 0])!!}
    {!! Form::close() !!}
</td>
