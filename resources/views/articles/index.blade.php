@extends('layouts.app')

@section('title', 'Новости - ' . config('app.name'))

@section('content')
    <h1 class="page-header">
        Новости

        @if (Auth::check())
            <a href="{{ route('article.create') }}" class="btn btn-default" title="Добавить новость">
                <i class="fa fa-plus"></i>
            </a>
        @endif
    </h1>

    @each('articles.teaser', $articles, 'article', 'articles.empty')
@endsection