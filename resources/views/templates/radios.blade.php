<div class="form-group">

{!! $input !!}

@if ( ! empty($errors))
    <div class="controls">
        @foreach ($errors as $error)
            <p class="help-block">{{ $error }}</p>
        @endforeach
    </div>
@endif

</div>
