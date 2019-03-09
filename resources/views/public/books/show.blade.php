@extends('layouts.app')

@section('title', 'Book Info')

@section('content')

@if(session('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')}}
    </div>
@endif

<div class="row">
    @if($book->cover)
    <div class="col-3">
            <img class="img-fluid" src="{{$book->cover}}" alt="Book's cover">
    </div>
    @endif
    <div class="col">
        <h2>{{ $book->title }}</h2>
        <h4 class="card-subtitle mb-2 text-muted">{{str_plural('Author', $book->authors->count())}}:  {{ $book->authors->pluck('name')->implode(', ')}}</h4>
        <h4>Publisher: {{$book->publisher->name}}</h4>
        <p>{{ $book->description }}</p>
    </div>
    </div>

    @include('public.books.partials.buttons')
@endsection
