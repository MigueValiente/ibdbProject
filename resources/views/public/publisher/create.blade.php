@extends('layouts.app')

@section('title', 'New Publisher')

@section('content')
<h1>Add New Publisher</h1>
<form action="/home" method="post" novalidate>

    @csrf

    @include('public.publisher.partials.form')

    <button type="submit" class="btn btn-primary">Save Publisher</button>
</form>
@endsection
