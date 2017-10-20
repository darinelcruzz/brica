{!! Form::open(['method' => 'POST', 'route' => 'hercules.item.stock.update']) !!}

<div class="input-group input-group-sm">
    <input type="hidden" name="id" value="{{ $item->id }}">
    <input type="hidden" name="action" value="{{ $action }}">
    <input type="number" class="form-control" name="stock" min="0" value="0" max="{{ $action == 'minus' ? $item->stock: 99999}}">
    <span class="input-group-btn">
      <button type="submit" class="btn btn-{{ $color }} btn-flat btn-xs">
          <i class="fa fa-{{ $action }}"></i>
      </button>
    </span>
</div>

{!! Form::close() !!}
