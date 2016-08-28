<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', 'Название коллекции') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
    @if ($errors->has('title'))
        <div class="help-block">{{ $errors->first('title') }}</div>
    @endif
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', 'Описание коллекции') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
    @if ($errors->has('description'))
        <div class="help-block">{{ $errors->first('description') }}</div>
    @endif
</div>
