@inject('settings', 'App\Settings\SettingsContract')

@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - {{ $settings->get('site_slogan') }}
@endsection

@section('highlight')

    @if ($settings->has('video_url'))
        <video src="{{ asset('storage/'.$settings->get('video_url')) }}" autoplay loop muted class="video-bg"></video>
    @endif

    <div class="video-overlay">
        <div class="jumbotron">
		<p>Make some changes here...</p>
            <h1>{{ config('app.name') }}</h1>

            @if ($settings->has('site_slogan'))
                <p>{{ $settings->get('site_slogan') }}</p>
            @endif

            @if ($settings->has('site_phone'))
                <a href="tel:{{ preg_replace('/[^\+\d]/', '', $settings->get('site_phone')) }}">
                    {{ $settings->get('site_phone') }}
                </a>
            @endif

            @if ($settings->has('site_email'))
                <a href="mailto:{{ $settings->get('site_email') }}">
                    {{ $settings->get('site_email') }}
                </a>
            @endif
        </div>
    </div>
@endsection
