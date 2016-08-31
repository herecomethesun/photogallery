@extends('layouts.app')

@section('title', "Коллекция &laquo;" . $collection->title . "&raquo; - " . config('app.name'))

@section('content')
    <h1 class="page-header">{{ $collection->title }} @include('collections.actions')</h1>

    <div class="collection-description">{!! $collection->description !!}</div>

    @if ($collection->albums)
        <h3>Альбомы коллекции (Всего: {{ $collection->albums->count() }})</h3>

        <section id="dg-container" class="dg-container">
            <div class="dg-wrapper">
                @foreach($collection->albums as $album)
                    <a href="{{ route('album.show', [$album->collection->id, $album->id]) }}">
                        @if ($album->cover)
                            @if (strpos($album->cover, 'lorem'))
                                <img src="{{ $album->cover }}" alt="{{ $album->title }}"/>
                            @else
                                <img src="{{ asset('storage/'.$album->cover) }}" alt="{{ $album->title }}"/>
                            @endif
                        @endif
                        <div>{{ str_limit($album->title, 50) }}</div>
                    </a>
                @endforeach
            </div>
            <nav>
                <span class="dg-prev">&lt;</span>
                <span class="dg-next">&gt;</span>
            </nav>
        </section>
    @endif
@endsection

@section('scripts')
    <script>
        $('#dg-container').gallery();
    </script>
@endsection