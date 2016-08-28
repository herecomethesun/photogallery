@extends('layouts.app')

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
