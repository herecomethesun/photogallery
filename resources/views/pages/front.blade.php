@extends('layouts.app')

@section('highlight')
    <video src="/front.mp4" autoplay loop muted class="video-bg"></video>

    <div class="video-overlay">
        <div class="jumbotron">
            <h1>{{ config('app.name') }}</h1>
            <p>Сайт дизайнера Анны Лесниковой</p>

            <a href="#">+7 (999) 999-99-99</a>
            <a href="#">annalesnikova@mail.ru</a>
        </div>
    </div>
@endsection

@section('content')

@endsection