@extends('layouts.app')

@section('title', 'About IBDB')

@section('content')
<h1>Book List</h1>
    <div id="buscador" class="buscador">
    <form id="searchForm">
        <input type="text" id="inputBuscador" name="inputBuscador" class="inputBuscador" placeholder="Escribe algo...">
        <button id="botonBusqueda" class="botonBusqueda">BUSCAR</button>
    </form>
    </div>
    <div id="mostrarLibros">
         @include ("public.books.partials.bookFormat")
    </div>
    <div class="mx-auto col-1">
        <div class="spinner-border invisible" role="status" id="spinnerLoad">
                <span class="sr-only"></span>
        </div>
    <div>
    
    @include("public.books.partials.modal")
    @include("public.books.partials.searchModal")
    @include("public.books.partials.obtainBooksModal")
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/otherScripts/modalScript.js') }}" defer></script>
    <script src="{{ asset('js/otherScripts/search.js') }}" defer></script>
    <script src="{{ asset('js/otherScripts/paginacion.js') }}" defer></script>
@endpush
