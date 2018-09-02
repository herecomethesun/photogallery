@inject('settings', 'App\Settings\SettingsContract')

@extends('layouts.app')

@section('title', "Настройки сайта - " . config('app.name'))

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
            <label for="site_adress" class="control-label">Адрес</label>
            <input
                    type="text"
                    class="form-control"
                    name="site_adress"
                    id="site_adress"
                    value="{{ old('site_adress', $settings->get('site_adress')) }}"
            />
        </div>

        <div class="form-group">
            <label for="site_map" class="control-label">Код карты</label>
            <p>1. Чтобы получить код карты, зайдите на сайт <a href="https://yandex.ru/map-constructor/"
                                                               target="_blank">https://yandex.ru/map-constructor/</a>.
            </p>
            <p>2. Создайте карту с метками, зафиксируйте положение карты и размер.</p>
            <p>3. Нажмите на кнопку "Получить код" и вставьте полученный код в поле ниже.</p>
            <input
                    type="text"
                    class="form-control"
                    name="site_map"
                    id="site_map"
                    value="{{ old('site_map', $settings->get('site_map')) }}"
            />
        </div>

        <div class="form-group">
            <label for="site_how" class="control-label">Как добраться?</label>
            <textarea
                    class="form-control"
                    name="site_how"
                    id="site_how"
                    value="{{ old('site_how', $settings->get('site_how')) }}"
            />{{ old('site_how', $settings->get('site_how')) }}</textarea>
        </div>

        <div class="form-group">
            <label for="site_text" class="control-label">Текст</label>
            <textarea
                    class="form-control"
                    name="site_text"
                    id="site_text"
                    value="{{ old('site_text', $settings->get('site_text')) }}"
            />{{ old('site_text', $settings->get('site_text')) }}</textarea>
        </div>

        <div class="form-group row">
            <div class="col-md-3">
                <label for="site_soc_vk" class="control-label">Вконтакте</label>
                <input
                        type="text"
                        class="form-control"
                        name="site_soc_vk"
                        id="site_soc_vk"
                        value="{{ old('site_soc_vk', $settings->get('site_soc_vk')) }}"
                />
            </div>
            <div class="col-md-3">
                <label for="site_soc_ok" class="control-label">Одноклассники</label>
                <input
                        type="text"
                        class="form-control"
                        name="site_soc_ok"
                        id="site_soc_ok"
                        value="{{ old('site_soc_ok', $settings->get('site_soc_ok')) }}"
                />
            </div>
            <div class="col-md-3">
                <label for="site_soc_inst" class="control-label">Инстаграм</label>
                <input
                        type="text"
                        class="form-control"
                        name="site_soc_inst"
                        id="site_soc_inst"
                        value="{{ old('site_soc_inst', $settings->get('site_soc_inst')) }}"
                />
            </div>
            <div class="col-md-3">
                <label for="site_soc_fb" class="control-label">Фейсбук</label>
                <input
                        type="text"
                        class="form-control"
                        name="site_soc_fb"
                        id="site_soc_fb"
                        value="{{ old('site_soc_fb', $settings->get('site_soc_fb')) }}"
                />
            </div>
        </div>

        <div class="form-group">
            <label for="site_other_text" class="control-label">Текст 2</label>
            <textarea
                    class="form-control"
                    name="site_other_text"
                    id="site_other_text"
                    value="{{ old('site_other_text', $settings->get('site_other_text')) }}"
            />{{ old('site_other_text', $settings->get('site_other_text')) }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Обновить настройки
            </button>
        </div>
    </form>
@endsection