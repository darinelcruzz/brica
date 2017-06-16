<td>
    {!! Form::checkboxes('orders', [$id]) !!}
    <input type="hidden" name="ids[]" value="{{ $id }}">
</td>
