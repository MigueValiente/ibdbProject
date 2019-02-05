@extends('layouts.app')

@section('Name', 'Publisher Info')

@section('content')
    <h2>{{ $publisher->name }}</h2>
    <h4>{{ $publisher->web }}</h4>
    <h4>{{ $publisher->email }}</h4>
    <p>{{ $publisher->address }}</p>

    @include('public.publishers.partials.buttons')
@endsection
