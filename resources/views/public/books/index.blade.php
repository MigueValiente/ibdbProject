@extends('layouts.app')

@section('title', 'About IBDB')

@section('content')
<h1>Book List</h1>
<<<<<<< HEAD

    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>

    @forelse($books as $book)
    <div class="card mb-2">
        <div class="card-header">
            {{ $book->title }}
        </div>
        <div class="card-body">
            <h5 class="card-title">User: <a href="{{route('user.index', $book->user->slug)}}" title="{{ $book->user->name}}'s book list">{{$book->user->name}}</a></h5>
            <h6 class="card-subtitle mb-2 text-muted">{{str_plural('Author', $book->authors->count())}}:  {{ $book->authors->pluck('name')->implode(', ')}}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Publisher: {{ $book->publisher->name}}</h6>
            <p class="card-text">{{ str_limit($book->description, 300) }}</p>
            @include('public.books.partials.buttons')
            <a href="/books/{{ $book->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>

      </div>
    </div>
    @empty
      <p>No hay libros</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $books->links() }}
=======
    <div id="buscador" class="buscador">
    <form id="searchForm">
        <input type="text" id="inputBuscador" name="inputBuscador" class="inputBuscador" placeholder="Escribe algo...">
        <button id="botonBusqueda" class="botonBusqueda">BUSCAR</button>
    </form>
>>>>>>> 8c4058232456670ca09b90923d8390c57e97aca3
    </div>
    <div id="mostrarLibros">
         @include ("public.books.partials.bookFormat")
</div>
    @include("public.books.partials.modal")
    @include("public.books.partials.searchModal")
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/otherScripts/modalScript.js') }}" defer></script>
    <script src="{{ asset('js/otherScripts/search.js') }}" defer></script>
@endpush
