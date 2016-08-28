<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', 'Заголовок страницы') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
    @if ($errors->has('title'))
        <div class="help-block">{{ $errors->first('title') }}</div>
    @endif
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    {{ Form::label('content', 'Содержимое страницы') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3]) }}
    @if ($errors->has('content'))
        <div class="help-block">{{ $errors->first('content') }}</div>
    @endif
</div>

<div class="panel panel-default">
    <div class="panel-heading">СЕО</div>

    <div class="panel-body">
        <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
            {{ Form::label('meta_keywords', 'Ключевые слова') }}
            {{ Form::text('meta_keywords', null, ['class' => 'form-control']) }}
            @if ($errors->has('meta_keywords'))
                <div class="help-block">{{ $errors->first('meta_keywords') }}</div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
            {{ Form::label('meta_description', 'Описание') }}
            {{ Form::text('meta_description', null, ['class' => 'form-control']) }}
            @if ($errors->has('meta_description'))
                <div class="help-block">{{ $errors->first('meta_description') }}</div>
            @endif
        </div>
    </div>
</div>
