@extends('layouts.app')

@section('title', "Редактирование альбома - " . config('app.name'))

@section('content')
    <h1 class="page-header">
        <i class="fa fa-image"></i>
        Изображения альбома ({{ $images->total() }})
    </h1>

    <div class="alert alert-info">
        На этой страницы Вы можете управлять изображениями альбома <strong>{{ $album->title }}</strong>
    </div>

    <div class="row">
        {{ $images->links() }}

        @foreach($images->chunk(6) as $chunked)
            <div class="row">
                @foreach($chunked as $image)
                    <div class="col-sm-2">
                        <div class="thumbnail">
                            <img src="{{ asset($image->thumbnail_path) }}" alt="">
                            <div class="caption">
                                {{ Form::open(['route' => ['image.delete', $image->id], 'method' => 'delete']) }}
                                <button type="submit" class="btn btn-danger" role="button">
                                    <i class="fa fa-trash"></i> Удалить
                                </button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        {{ $images->links() }}
    </div>
@endsection
