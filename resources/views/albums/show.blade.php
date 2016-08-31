@extends('layouts.app')

@section('title')
&laquo;{{ $album->title }}&raquo; из коллекции &laquo;{{ $album->collection->title }}&raquo; - {{ config('app.name') }}
@endsection

@section('content')
    <h1 class="page-header">
        Альбом: {{ $album->title }}

        @include('albums.actions')
    </h1>

    <div class="row">
        <div class="col-md-5">
            <p>
                <strong>Название коллекции:</strong>
                <a href="{{ route('collection.show', $album->collection->id) }}">
                    {{ $album->collection->title }}
                </a>
            </p>
            <p>
                <strong>Описание альбома:</strong><br>
                {!! $album->description !!}
            </p>

            <p>
                <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal">
                    <i class="fa fa-cart"></i> Оставить заявку
                </a>
            </p>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Изображения альбома</div>
                <div class="panel-body">
                    @if ($album->images->count())
                        <div class="row">
                            @foreach($album->images as $image)
                                <div class="col-xs-6 col-md-3">
                                    <a href="{{ asset("storage/".$image->path) }}" class="thumbnail">
                                        <img src="{{ asset("storage/".$image->thumbnail_path) }}" alt=""/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('album.upload', $album->id) }}"
                          class="dropzone"
                          id="addPhotosForm"
                    >
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('albums.modal')
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFileSize: 2,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp',
        }
    </script>
@endsection
