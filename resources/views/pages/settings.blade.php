@inject('settings', 'App\Settings\SettingsContract')

@extends('layouts.app')

@section('content')
    <h1>Настройки сайта</h1>

    @include('partials.errors')

    <form action="{{ route('settings.update') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="site_email" class="control-label">E-mail</label>
            <input
                    type="email"
                    class="form-control"
                    name="site_email"
                    id="site_email"
                    value="{{ old('site_email', $settings->get('site_email')) }}"
            />

            <div class="help-block">Контактный email</div>
        </div>

        <div class="form-group">
            <label for="site_phone" class="control-label">Телефон</label>
            <input
                    type="tel"
                    class="form-control"
                    name="site_phone"
                    id="site_phone"
                    value="{{ old('site_phone', $settings->get('site_phone')) }}"
            />

            <div class="help-block">Контактный телефон</div>
        </div>

        <div class="form-group">
            <label for="site_slogan" class="control-label">Слоган сайта</label>
            <input
                    type="text"
                    class="form-control"
                    name="site_slogan"
                    id="site_slogan"
                    value="{{ old('site_slogan', $settings->get('site_slogan')) }}"
            />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Обновить настройки
            </button>
        </div>
    </form>
@endsection