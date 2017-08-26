{!! Form::open(['method' => 'POST', 'route' => 'hercules.production.assign']) !!}
  <div class="input-group input-group-sm">
      <input type="hidden" name="id" value="{{ $order->id }}">
      <input type="hidden" name="process" value="{{ $tprocess }}">
      <select class="form-control" name="team">
          <option selected disabled>Para {{ $tproceso }}</option>
          @foreach ($personnel as $member)
              <option value="{{ $member->name }}">{{ $member->name }}</option>
          @endforeach
      </select>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-{{ $tcolor }} btn-flat btn-xs">
            <i class="fa fa-check"></i>
        </button>
      </span>
  </div>
{!! Form::close() !!}
