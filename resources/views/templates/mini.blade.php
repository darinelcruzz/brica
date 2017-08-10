<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    <label for="{{ $id }}" class="control-label">
        {{ $label }}
    </label>

    <div class="input-group">
        {!! $input !!}
    </div>
    @foreach ($errors as $error)
        <p class="help-block">{{ $error }}</p>
    @endforeach
</div>
