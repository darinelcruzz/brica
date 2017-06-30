<td>
    {!! Form::open(['method' => 'POST', 'route' => 'production.create']) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        <button type="submit" name="button" class="btn btn-success">
            <i class="fa fa-plus"></i>
        </button>
    {!! Form::close() !!}
</td>