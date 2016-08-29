@extends('layouts.app')

@section('title', $article->title . ' - ' . config('app.name'))

@section('meta')
    <meta name="keywords" content="{{ $article->meta_keywords }}">
    <meta name="description" content="{{ $article->meta_description }}">
@endsection

@section('content')
    <h1 class="page-header">
        {{ $article->title }}

        @include('articles.actions')
    </h1>

    <p class="text-muted">
        @if (!$article->published)
            <span class="label label-primary">Черновик</span>
        @endif
        {{ $article->created_at->format('d.m.Y') }}
    </p>

    <div class="article-body">{!! $article->content !!}</div>

    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
    <script src="//yastatic.net/share2/share.js"></script>
    <div class="text-right">
        <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"></div>
    </div>
@endsection
