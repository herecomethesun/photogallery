@extends('layouts.app')

@section('title', "Коллекция &laquo;" . $collection->title . "&raquo; - " . config('app.name'))

@section('content')
    <h1 class="page-header">{{ $collection->title }} @include('collections.actions')</h1>

    <div class="collection-description">{!! $collection->description !!}</div>

    @if ($collection->albums)
        <h3>Альбомы коллекции (Всего: {{ $collection->albums->count() }})</h3>

        <div id="albums" class="albums">
            @include('collections.items')
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        var $albums = $('#albums').masonry({
            itemSelector: '.album',
            columnWidth: 150
        });

        $albums.imagesLoaded().progress(function() {
            $albums.masonry('layout');
        });
    </script>
@endsection    