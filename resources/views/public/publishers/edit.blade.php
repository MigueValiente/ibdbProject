@extends('layouts.app')

@section('title', 'New Publisher')

@section('content')
<h1>Edit Publisher</h1>
<form action="/publishers/{{ $publisher->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.publishers.partials.form')

    <button type="submit" class="btn btn-primary">Update Publisher</button>
</form>
@endsection
