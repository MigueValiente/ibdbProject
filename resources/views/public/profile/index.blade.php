@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <ul class="nav nav-pills" id="myTabPill" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" id="home-pill" data-toggle="pill" href="#homePill" role="tab" aria-controls="home" aria-selected="true">Datos Personales</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="profile-pill" data-toggle="pill" href="#profilePill" role="tab" aria-controls="profile" aria-selected="false">Mis Libros</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="contact-pill" data-toggle="pill" href="#contactPill" role="tab" aria-controls="contact" aria-selected="false">Amigos</a>
      </li>
  </ul>
  <div class="tab-content" id="myTabContentPill">
      <div class="tab-pane fade show active" id="homePill" role="tabpanel" aria-labelledby="home-tab">@include('public.profile.data')</div>
      <div class="tab-pane fade" id="profilePill" role="tabpanel" aria-labelledby="profile-tab">@include('public.profile.myBooks')</div>
      <div class="tab-pane fade" id="contactPill" role="tabpanel" aria-labelledby="contact-tab">@include('public.profile.friends')</div>
  </div>
@endsection

@push('scripts')
    <script src="{{ mix('/js/navs.js') }}" defer ></script>
@endpush

{{-- data = son atributos personalizado
aria = para screen readers
role = para el navegador --}}
