@extends('layouts.app')

@section('content')
    <h1>{{ $collection->title }}</h1>

    <p>{{ $collection->description }}</p>

    @if (Auth::check())
        <a href="{{ route('collection.edit', $collection->id) }}" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Редактировать
        </a>

        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if (confirm('Вы уверены?')) document.getElementById('delete-collection-form').submit();">
            <i class="fa fa-trash"></i> Удалить коллекцию
        </a>

        <form id="delete-collection-form"
              method="post"
              action="{{ route('collection.delete', $collection->id) }}"
              class="hidden"
        >
            {{ csrf_field() }}
            {{ method_field('delete') }}
        </form>
    @endif
@endsection
