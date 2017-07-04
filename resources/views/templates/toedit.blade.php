<td>
    <a href="{{ route($ruta, ['id' => $id]) }}"><i class="fa fa-edit"></i></a>
    {{--} Form::open(['method' => 'POST', 'route' => $ruta]) !!}
        <input type="hidden" name="id" value="{{ $id }}">
        <button type="submit" name="button" class="btn btn-success">
            <i class="fa fa-edit"></i>
        </button>
    {!! Form::close() !!--}}
</td>
