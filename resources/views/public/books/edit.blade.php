@extends('layouts.app')

@section('title', 'New book')

@section('content')
<h1>Edit Book</h1>
<form action="/books/{{ $book->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.books.partials.form')

    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
@endsection
