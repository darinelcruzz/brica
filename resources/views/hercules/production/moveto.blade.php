{!! Form::open(['method' => 'POST', 'route' => 'hercules.order.move']) !!}
  <div class="input-group input-group-sm">
      <input type="hidden" name="id" value="{{ $order->id }}">
      <input type="hidden" name="process" value="{{ $process['next']['e']  }}">
      <select class="form-control" name="status">
          <option selected disabled>Mover a</option>
          @if ($order->receiptr->type == 'reparacion')
              @if ($order->status == 'fondeo')
                  <option value="vestido">Vestido</option>
                  <option value="pintura">Pintura</option>
                  <option value="montaje">Montaje</option>
              @elseif ($order->status == 'vestido')
                  <option value="pintura">Pintura</option>
                  <option value="montaje">Montaje</option>
              @elseif ($order->status == 'pintura')
                  <option value="montaje">Montaje</option>
              @else
                  <option value="fondeo">Fondeo</option>
                  <option value="vestido">Vestido</option>
                  <option value="pintura">Pintura</option>
                  <option value="montaje">Montaje</option>
              @endif
          @else
              <option value="interno">Almacén</option>
              <option value="{{ $process['next']['s']  }}" {{ !$order->isOkToMOve($process) ? " disabled" : '' }}>
                  {{ ucfirst($process['next']['s'] ) }}
              </option>
          @endif
      </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-{{ $process['color']  }} btn-flat btn-xs">
            <i class="fa fa-check"></i>
        </button>
      </span>
  </div>
{!! Form::close() !!}
