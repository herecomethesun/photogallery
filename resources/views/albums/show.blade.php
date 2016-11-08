@extends('layouts.app')

@section('title')
&laquo;{{ $album->title }}&raquo; из коллекции &laquo;{{ $album->collection->title }}&raquo; - {{ config('app.name') }}
@endsection

@section('content')
    <h1 class="page-header">{{ $album->title }}</h1>

    @include('albums.actions')

    <p>
        <a href="{{ route('collection.show', $album->collection->id) }}">
            {{ $album->collection->title }}
        </a>
    </p>

    <div class="album-description">
        {!! $album->description !!}
    </div>

    @if (Auth::check())
        <p>
            <a href="{{ route('image.create', $album->id) }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Добавить изображение
            </a>

            <a href="{{ route('image.index', $album->id) }}" class="btn btn-default btn-sm">
                 <i class="fa fa-image"></i> Управление изображениями
            </a>
        </p>
    @endif

    <div id="album-images" class="album-images">
        @foreach($images as $image)
            <a href="{{ asset($image->path) }}" class="entry-item">
                <img src="{{ asset($image->thumbnail_path) }}" alt=""/>
            </a>
        @endforeach
    </div>

    @include('albums.modal')
@endsection

@section('scripts')
    <script>
        $('#album-images').justifiedGallery({
            rowHeight: 300,
            margins: 1
        });

        $('#album-images').lightGallery({
            selector: '.entry-item'
        });
    </script>
@endsection
