@extends('layouts.app')

@section('title', 'New book')

@section('content')
<h1>Edit Book</h1>
<form action="/books/{{ $book->id }}" method="post" id="updateForm" name="updateForm"  data-bookId={{$book->id}} novalidate>

    @csrf
    @method('patch')

    @include('public.books.partials.form')

    <button type="submit" class="btn btn-primary" id="updateButton" class="updateClass">Update Book</button>
</form>
<div class="editResult" id="editResult" name="editResult">
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/validaciones/editarAjax.js') }}"></script>
@endpush
