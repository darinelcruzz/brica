{!! Form::open(['method' => 'POST', 'route' => 'hercules.manager.assign']) !!}
  <div class="input-group input-group-sm">
      <input type="hidden" name="id" value="{{ $order->id }}">
      <input type="hidden" name="process" value="welding">
      <select class="form-control" name="team">
          <option selected disabled>Para soldadura</option>
          <option value="H1">H1</option>
          <option value="H2">H2</option>
          <option value="H3">H3</option>
          <option value="H4">H4</option>
      </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary btn-flat btn-xs">
            <i class="fa fa-check"></i>
        </button>
      </span>
  </div>
{!! Form::close() !!}
