<td>
    {!! Form::open(['method' => 'POST', 'route' => 'order.start']) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        <button type="submit" name="button" class="btn btn-primary">
            <i class="fa fa-arrow-right"></i>
        </button>
    {!! Form::close() !!}
</td>