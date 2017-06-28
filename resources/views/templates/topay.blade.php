<td>
    {!! Form::open(['method' => 'POST', 'route' => 'quotation.pay']) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        <button type="submit" name="button" class="btn btn-success">
            <i class="fa fa-dollar"></i>
        </button>
    {!! Form::close() !!}
</td>