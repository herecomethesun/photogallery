@extends('layouts.app')

@section('title')
&laquo;{{ $album->title }}&raquo; из коллекции &laquo;{{ $album->collection->title }}&raquo; - {{ config('app.name') }}
@endsection

@section('content')
    <h1 class="page-header">{!! $album->title !!}</h1>

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
            <div class="album-image">
                <a href="{{ asset($image->path) }}" class="entry-item">
                    <img src="{{ asset($image->thumbnail_path) }}" alt=""/>
                </a>

                <div class="order-btn-div">
                    <button class="order-btn btn btn-primary"
                            data-image="{{ asset($image->path) }}"
                            data-thumbnail="{{ asset($image->thumbnail_path) }}"
                    >
                        Заказать
                    </button>
                </div>
            </div>
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

        $('#album-images').on('click', '.order-btn', function () {
            var $this = $(this);
            $('#order-img-preview').attr('src', $this.data('thumbnail'));
            $('#selected-image').val($this.data('image'));
            $('#orderModal').modal('show');
        });

        $('#order-form').on('submit', function (event) {
            event.preventDefault();

            var data = $(this).serialize();

            $.post('/order', data, function (data) {
                if (data.status === 'success') {
                    $('#orderModal').modal('hide');
                    swal("Выполнено!", "Ваш заказ принят!", "success");
                }
            });
        });
    </script>
@endsection
