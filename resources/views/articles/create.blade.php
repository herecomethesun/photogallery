@extends('layouts.app')

@section('content')
    <h1 class="page-header">
        Создание новости
    </h1>

    {{ Form::open(['route' => 'article.store', 'method' => 'post']) }}

        @include('articles.form')

        <div class="form-group">
            <button class="btn btn-primary btn-lg" type="submit">
                Создать
            </button>
        </div>

    {{ Form::close() }}
@endsection
