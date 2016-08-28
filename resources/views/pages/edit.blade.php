@extends('layouts.app')

@section('content')
    <h1>Редактирование страницы &laquo;{{ $page->title }}&raquo;</h1>

    @include('partials.errors')

    {{ Form::model($page, ['route' => ['page.update', $page->id], 'method' => 'patch']) }}
        @include('pages.form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Сохранить
            </button>
        </div>
    {{ Form::close() }}
@endsection
