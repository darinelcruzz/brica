<div id="field_{{ $id }}" {!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    <label for="{{ $id }}" class="col-sm-3 control-label">
        {{ $label }}
    </label>
    <div class="col-sm-9">
        {!! $input !!}
        @foreach ($errors as $error)
            <p class="help-block">{{ $error }}</p>
        @endforeach
    </div>
</div>
