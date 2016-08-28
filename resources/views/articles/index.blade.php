@extends('layouts.app')

@section('content')
    <h1 class="page-header">
        Новости

        <a href="{{ route('article.create') }}" class="btn btn-default" title="Добавить новость">
            <i class="fa fa-plus"></i>
        </a>
    </h1>

    @each('articles.teaser', $articles, 'article', 'articles.empty')
@endsection