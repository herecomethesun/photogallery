@extends('layouts.app')

@section('title', "Создание нового альбома - " . config('app.name'))

@section('content')
    <h1>Создание нового альбома</h1>

    <form action="{{ route('album.store') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="control-label">Название альбома</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"/>
            @if ($errors->has('title'))
                <div class="help-block">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="collection_id" class="control-label">Коллекция</label>
            <select name="collection_id" id="collection_id" class="form-control">
                @foreach($collections as $collection)
                    <option value="{{ $collection->id }}">
                        {{ $collection->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="control-label">Описание</label>
            <textarea name="description" id="description" class="form-control editor" rows="5">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <div class="help-block">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Создать
            </button>
        </div>
    </form>
@endsection
