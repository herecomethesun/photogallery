@extends('layouts.app')

@section('content')
    <h1>Редактирование коллекции &laquo;{{ $collection->title }}&raquo;</h1>

    {{ Form::model($collection, ['route' => ['collection.update', $collection->id], 'method' => 'patch']) }}
        @include('collections.form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Сохранить
            </button>
        </div>
    {{ Form::close() }}
@endsection
