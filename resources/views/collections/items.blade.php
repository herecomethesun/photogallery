@foreach($collection->albums as $album)
    <div class="album">
        @if ($album->cover)
            <a href="{{ route('album.show', [$album->collection->id, $album->id]) }}">
                <img src="{{ asset($album->cover) }}" alt="{{ $album->title }}" class="album-cover"/>
            </a>
        @else
            <p>
                <a href="{{ route('album.show', [$album->collection->id, $album->id]) }}">
                    {{ str_limit($album->title, 50) }}
                </a>
            </p>
        @endif
    </div>
@endforeach