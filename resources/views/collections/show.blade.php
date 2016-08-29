@extends('layouts.app')

@section('title', "Коллекция &laquo;" . $collection->title . "&raquo; - " . config('app.name'))

@section('content')
    <h1>{{ $collection->title }} @include('collections.actions')</h1>

    <p>{{ $collection->description }}</p>

    @if ($collection->albums)
        <div class="panel panel-default">
            <div class="panel-heading">
                Альбомы коллекции (Всего: {{ $collection->albums->count() }})
            </div>
            <div class="panel-body">
                @foreach($collection->albums->chunk(3) as $chunked)
                    <div class="row">
                        @foreach($chunked as $album)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('storage/'.$album->cover) }}" alt="{{ $album->title }}">
                                    <div class="caption">
                                        <h3>{{ $album->title }}</h3>
                                        <p>{{ $album->description }}</p>
                                        <p>
                                            <a href="{{ route('album.show', [$album->collection->id, $album->id]) }}"
                                               class="btn btn-primary"
                                               role="button"
                                            >
                                                Подробнее
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
