@extends('layouts.app')

@section('title', $page->title . ' - ' . config('app.name'))

@section('content')
    <h1>
        {{ $page->title }}
        @include('pages.actions')
    </h1>
    {!! $page->content !!}
@endsection
