{!! Form::open(['method' => 'POST', 'route' => 'hercules.order.move']) !!}
  <div class="input-group input-group-sm">
      <input type="hidden" name="id" value="{{ $order->id }}">
      <input type="hidden" name="process" value="{{ $process['next']['e']  }}">
      <select class="form-control" name="status">
          <option selected disabled>Mover a</option>
          <option value="interno">Almacén</option>
          <option value="{{ $process['next']['s']  }}" {{ !$order->isOkToMOve($process) ? " disabled" : '' }}>
              {{ ucfirst($process['next']['s'] ) }}
          </option>
      </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-{{ $process['color']  }} btn-flat btn-xs">
            <i class="fa fa-check"></i>
        </button>
      </span>
  </div>
{!! Form::close() !!}
