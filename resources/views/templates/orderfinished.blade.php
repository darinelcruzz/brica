<td>
    {!! Form::open(['method' => 'POST', 'route' => 'production.finish']) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        <button type="submit" name="button" class="btn btn-success">
            <i class="fa fa-check"></i>
        </button>
    {!! Form::close() !!}
</td>
