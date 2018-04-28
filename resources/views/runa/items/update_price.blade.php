{!! Form::open(['method' => 'POST', 'route' => 'runa.item.update']) !!}

<div class="input-group input-group-sm">
    <input type="hidden" name="id" value="{{ $item->id }}">
    <input type="number" class="form-control" name="price" min="0" value="{{ $item->price }}" step="0.01" maxlength="5">
    <span class="input-group-btn">
      <button type="submit" class="btn btn-warning btn-flat btn-xs">
          <i class="fa fa-check"></i>
      </button>
    </span>
</div>

{!! Form::close() !!}