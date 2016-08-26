@extends('layouts.app')

@section('content')
    <h1>
        {{ $page->title }}
        @include('pages.actions')
    </h1>
    <p>{{ $page->content }}</p>
@endsection
