<td>
    {!! Form::open(['method' => 'POST', 'route' => 'quotation.pay']) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        {!! Field::number('payment',
            ['tpl' => 'templates/inlinebutton', 'ph' => '$0.00', 'min' => 0])!!}
    {!! Form::close() !!}
</td>
