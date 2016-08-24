@extends('layouts.app')

@section('content')
    <h1>Создание новой коллекции</h1>

    <form action="{{ route('collection.update', $collection->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <lavel for="title" class="control-label">Название коллекции</lavel>

            <input type="text"
                   id="title"
                   name="title"
                   class="form-control"
                   value="{{ old('title', $collection->title) }}"
            />

            @if ($errors->has('title'))
                <div class="help-block">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <lavel for="description" class="control-label">Описание</lavel>
            <textarea name="description" id="description" class="form-control">{{ old('description', $collection->description) }}</textarea>
            @if ($errors->has('description'))
                <div class="help-block">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Сохранить
            </button>
        </div>
    </form>
@endsection