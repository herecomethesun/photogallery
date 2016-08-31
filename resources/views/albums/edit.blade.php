@extends('layouts.app')

@section('title', "Редактирование альбома - " . config('app.name'))

@section('content')
    <h1>Редактирование альбома &laquo;{{ $album->title }}&raquo;</h1>

    <form action="{{ route('album.update', $album->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="control-label">Название альбома</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $album->title) }}"/>
            @if ($errors->has('title'))
                <div class="help-block">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="collection_id" class="control-label">Коллекция</label>
            <select name="collection_id" id="collection_id" class="form-control">
                @foreach($collections as $collection)
                    <option
                            value="{{ $collection->id }}"
                            @if ($collection->id === old('collection_id', $album->collection->id))
                                selected="selected"
                            @endif
                    >
                        {{ $collection->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="control-label">Описание</label>
            <textarea name="description" id="description" class="form-control editor">{{ old('description', $album->description) }}</textarea>
            @if ($errors->has('description'))
                <div class="help-block">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Обновить
            </button>
        </div>
    </form>
@endsection
