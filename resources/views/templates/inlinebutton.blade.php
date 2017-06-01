<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    <div class="input-group margin">
        {!! $input !!}
        <span class="input-group-btn">
            <button type="submit" class="btn btn-success btn-flat">ok</button>
        </span>
    </div>
    @foreach ($errors as $error)
        <p class="help-block">{{ $error }}</p>
    @endforeach
</div>
