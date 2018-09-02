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

    @if ($settings->has('site_soc_vk') && !empty($settings->get('site_soc_vk')))
        <a href="{{ $settings->get('site_soc_vk') }}" target="_blank"><img src="{{ asset('build/img/vk.png') }}"
                                                                           alt="Вконтакте"></a>
    @endif

    @if ($settings->has('site_soc_ok') && !empty($settings->get('site_soc_ok')))
        <a href="{{ $settings->get('site_soc_ok') }}" target="_blank"><img src="{{ asset('build/img/ok.png') }}"
                                                                           alt="Одноклассники"></a>
    @endif

    @if ($settings->has('site_soc_inst') && !empty($settings->get('site_soc_inst')))
        <a href="{{ $settings->get('site_soc_inst') }}" target="_blank"><img src="{{ asset('build/img/inst.png') }}"
                                                                             alt="Инстаграм"></a>
    @endif

    @if ($settings->has('site_soc_fb') && !empty($settings->get('site_soc_fb')))
        <a href="{{ $settings->get('site_soc_fb') }}" target="_blank"><img src="{{ asset('build/img/fb.png') }}"
                                                                           alt="Фейсбук"></a>
    @endif

    @if ($settings->has('site_adress'))
        <p>
            {{ $settings->get('site_adress') }}
        </p>
    @endif

    @if ($settings->has('site_map'))
        {!! ($settings->get('site_map')) !!}
    @endif

    <br>

    @if ($settings->has('site_how'))
        <p>
            {{ $settings->get('site_how') }}
        </p>
    @endif

    @if ($settings->has('site_text'))
        <p>
            {{ $settings->get('site_text') }}
        </p>
    @endif

    @if ($settings->has('site_other_text'))
        <p>
            {{ $settings->get('site_other_text') }}
        </p>
    @endif
@endsection
