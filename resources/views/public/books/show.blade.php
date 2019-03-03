@extends('layouts.app')

@section('title', 'Book Info')

@section('content')
    <h2>{{ $book->title }}</h2>
    <h4 class="card-subtitle mb-2 text-muted">{{str_plural('Author', $book->authors->count())}}:  {{ $book->authors->pluck('name')->implode(', ')}}</h4>
    <h4>Publisher: {{$book->publisher->name}}</h4>
    <p>{{ $book->description }}</p>

    @include('public.books.partials.buttons')
@endsection
