@extends('layouts.app')

@section('content')
    <h1 class="page-header">
        Редактирование новости &laquo;{{ $article->title }}&raquo;
    </h1>

    {{ Form::model($article, ['route' => ['article.update', $article->id], 'method' => 'patch']) }}

        @include('articles.form')

        <div class="form-group">
            <button class="btn btn-primary btn-lg" type="submit">
                Сохранить
            </button>
        </div>

    {{ Form::close() }}
@endsection
