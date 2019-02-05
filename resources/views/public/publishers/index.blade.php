@extends('layouts.app')

@section('title', 'About IBDB')

@section('content')
<h1>Publishers List</h1>

    <div class="d-flex justify-content-center">
        {{ $publishers->links() }}
    </div>

    @forelse($publishers as $publisher)
    <div class="card mb-2">
        <div class="card-header">
            {{ $publisher->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Web: {{$publisher->web}}</h5>
            <h6 class="card-title">Email: {{ $publisher->email}}</h6>
            <p class="card-title">Address: {{ $publisher->address}}</p>
            @include('public.publishers.partials.buttons')
            <a href="/publishers/{{ $publisher->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>


      </div>
    </div>
    @empty
      <p>No hay libros</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $publishers->links() }}
    </div>
@endsection
