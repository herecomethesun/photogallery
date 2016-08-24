@extends('layouts.app')

@section('content')
    <h1>{{ $collection->title }}</h1>

    <p>{{ $collection->description }}</p>
@endsection
