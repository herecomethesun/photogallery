@extends('layouts.app')

@section('title', "Редактирование альбома - " . config('app.name'))

@section('content')
    <h1 class="page-header">
        <i class="fa fa-image"></i>
        Изображения альбома ({{ $images->total() }})
    </h1>

    <div class="alert alert-info">
        На этой страницы Вы можете управлять изображениями альбома <strong>{!! $album->title !!}</strong>
    </div>

    {{ Form::model($album, ['route' => ['album.updateCoverImage', $album->id], 'method' => 'post']) }}
    <div class="form-group">
        <label for="cover_image_id" class="control-label">Идендификатор изображения для обложки</label>
        <input
                type="number"
                class="form-control"
                name="cover_image_id"
                id="cover_image_id"
                value="{{$album->cover_image_id}}"
        />
    </div>
    <button type="submit" class="btn btn-sm btn-success" role="button">
        <i class="fa fa-trash"></i> Сохранить
    </button>
    {{ Form::close() }}

    <div class="row">
        {{ $images->links() }}


        @foreach($images->chunk(6) as $chunked)
            <div class="row">
                @foreach($chunked as $image)
                    <div class="col-sm-2">
                        <div class="thumbnail">
                            <img src="{{ asset($image->thumbnail_path) }}" alt="">
                            <div class="caption">
                                {{ Form::model($image, ['route' => ['image.update', $image->id], 'method' => 'patch']) }}
                                <div class="form-group">
                                    <label for="priority" class="control-label">Приоритет</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="priority"
                                            id="priority"
                                            value="{{$image->priority}}"
                                    />
                                </div>
                                <button type="submit" class="btn btn-sm btn-success" role="button">
                                    <i class="fa fa-trash"></i> Сохранить
                                </button>
                                {{ Form::close() }}

                                {{ Form::open(['route' => ['image.delete', $image->id], 'method' => 'delete']) }}
                                <button type="submit" class="btn btn-sm btn-danger" role="button" style="margin-top: 5px">
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
