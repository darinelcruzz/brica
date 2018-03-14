{!! Form::open(['method' => 'POST', 'route' => 'hercules.gondola.deposit']) !!}

<div class="input-group input-group-sm">
    <input type="hidden" name="gondola_id" value="{{ $gondola->id }}">
    <input type="hidden" name="description" value="pago góndola">
    <input type="number" class="form-control" name="amount" min="0" value="0" max="{{ $gondola->debt }}">
    <span class="input-group-btn">
      <button type="submit" class="btn btn-success btn-flat btn-xs">
          <i class="fa fa-plus"></i>
      </button>
    </span>
</div>

{!! Form::close() !!}
