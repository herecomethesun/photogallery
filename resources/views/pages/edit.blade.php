@extends('layouts.app')

@section('content')
    <h1>Редактирование страницы &laquo;{{ $page->title }}&raquo;</h1>

    @include('partials.errors')

    <form action="{{ route('page.update', $page->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="form-group">
            <label for="title">Заголовок страницы</label>
            <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="content">Текст страницы</label>
            <textarea
                    name="content"
                    id="content"
                    rows="10"
                    class="form-control"
            >{{ old('content', $page->content) }}</textarea>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">СЕО</div>

            <div class="panel-body">
                <div class="form-group">
                    <label for="meta_keywords">Ключевые слова</label>
                    <input
                            type="text"
                            name="meta_keywords"
                            id="meta_keywords"
                            value="{{ old('meta_keywords', $page->meta_keywords) }}"
                            class="form-control"
                    />
                </div>

                <div class="form-group">
                    <label for="meta_description">Описание</label>
                    <input
                            type="text"
                            name="meta_description"
                            id="meta_description"
                            value="{{ old('meta_description', $page->meta_description) }}"
                            class="form-control"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Сохранить
            </button>
        </div>
    </form>
@endsection
