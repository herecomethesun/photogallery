@inject('settings', 'App\Settings\SettingsContract')

@extends('layouts.app')

@section('title', 'Контакты - ' . config('app.name'))

@section('content')
    <h1>Наши контакты</h1>

    @if ($settings->has('site_phone'))
        <p>
            <a href="tel:{{ preg_replace('/[^\+\d]/', '', $settings->get('site_phone')) }}">
                {{ $settings->get('site_phone') }}
            </a>
        </p>
    @endif

    @if ($settings->has('site_email'))
        <p>
            <a href="mailto:{{ $settings->get('site_email') }}">
                {{ $settings->get('site_email') }}
            </a>
        </p>
    @endif
@endsection
