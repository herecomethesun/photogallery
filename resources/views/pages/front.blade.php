@inject('settings', 'App\Settings\SettingsContract')

@extends('layouts.app')

@section('highlight')

    @if ($settings->has('video_url'))
        <video src="{{ asset('storage/'.$settings->get('video_url')) }}" autoplay loop muted class="video-bg"></video>
    @endif

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