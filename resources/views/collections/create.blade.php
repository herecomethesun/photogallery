@extends('layouts.app')

@section('title', "Создание новой коллекции - " . config('app.name'))

@section('content')
    <h1>Создание новой коллекции</h1>

    {{ Form::open(['route' => 'collection.store', 'method' => 'post']) }}
        @include('collections.form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Создать
            </button>
        </div>
    {{ Form::close() }}
@endsection
