@extends('layouts.app')

@section('title', "Изменение видео на главной странице - " . config('app.name'))

@section('content')
    <h1>Изменение видео на главной странице</h1>

    <div class="alert alert-info">
        <ol>
            <li>Загрузка видео может занять продолжительное время, в зависимости от скорости интернета.</li>
            <li>Максимальный размер видеофайла не должен превышать 10Мб.</li>
            <li>Рекомендуемое разрешение видео не менее 720x480 пикселей.</li>
            <li>Фидео должно быть в формате *.mp4 или *.webm</li>
        </ol>
    </div>

    @include('partials.errors')

    <form action="{{ route('video.update') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="video" class="control-label">Выберите файл</label>
            <input type="file" class="form-control" name="video" id="video"/>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Загрузить</button>
        </div>
    </form>
@endsection
