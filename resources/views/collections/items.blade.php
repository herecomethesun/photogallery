@foreach($collection->albums as $album)
    <div class="album">
        @if ($album->cover)
            <div class="album-title" style="text-align: center">
                {!! $album->title !!}
            </div>
            <a href="{{ route('album.show', [$album->collection->id, $album->id]) }}">
                <img src="{{ asset($album->cover) }}" alt="album" class="album-cover"/>
            </a>
            <div class="order-btn-div">
                <button class="order-btn btn btn-light"
                >
                    Подробнее
                </button>
            </div>
            <span>{{ $collection->title }}</span>
        @else
            <p>
                <a href="{{ route('album.show', [$album->collection->id, $album->id]) }}">
                    {{ str_limit($album->title, 50) }}
                </a>
            </p>
        @endif
    </div>
@endforeach