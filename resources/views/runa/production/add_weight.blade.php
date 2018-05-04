{!! Form::open(['method' => 'POST', 'route' => 'runa.manager.addWeight']) !!}

<div class="input-group input-group-sm">
  <input type="hidden" name="id" value="{{ $row->id }}">
  <input type="number" class="form-control" name="weight" min="0" value="0" step="0.01" required>
  <span class="input-group-btn">
    <button type="submit" class="btn btn-success btn-flat btn-xs">
        <i class="fa fa-plus"></i>
    </button>
  </span>
</div>

{!! Form::close() !!}