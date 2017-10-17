{!! Form::open(['method' => 'POST', 'route' => 'hercules.receipt.deposit']) !!}

<div class="input-group input-group-sm">
    <input type="hidden" name="id" value="{{ $receipt->id }}">
    <input type="hidden" name="retainer" value="{{ $receipt->retainer }}">
    <input type="number" class="form-control" name="deposit" min="0" value="0" step="0.01">
    <span class="input-group-btn">
      <button type="submit" class="btn btn-success btn-flat btn-xs">
          <i class="fa fa-plus"></i>
      </button>
    </span>
</div>

{!! Form::close() !!}
