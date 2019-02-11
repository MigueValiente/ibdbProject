@extends('layouts.app')

@section('title', 'New book')

@section('content')
<h1>Add New Book</h1>
<form action="/books" method="post" name="createBookForm" id="createBookForm" novalidate>

    @csrf

    @include('public.books.partials.form')

    <button type="submit" class="btn btn-primary" name="saveBookButton" idea="saveBookButton">Save Book</button>
</form>
<div class="bookData" id="bookData"></div>
@endsection
@push('scripts')
    <script src="{{ asset('js/validaciones/bookValidation.js') }}"></script>
@endpush
