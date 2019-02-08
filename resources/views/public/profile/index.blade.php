@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <ul class="nav nav-pills" id="myTabPill" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" id="profile-pill" data-toggle="pill" href="#div-profile-pill" role="tab" aria-controls="profile" aria-selected="true">Datos Personales</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="books-pill" data-toggle="pill" href="#div-books-pill" role="tab" aria-controls="books" aria-selected="false">Mis Libros</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="friends-pill" data-toggle="pill" href="#div-friends-pill" role="tab" aria-controls="friends" aria-selected="false">Amigos</a>
      </li>
  </ul>
  <div class="tab-content" id="myTabContentPill">
      <div class="tab-pane fade show active" id="div-profile-pill" role="tabpanel" aria-labelledby="profile-tab"></div>
      <div class="tab-pane fade" id="div-books-pill" role="tabpanel" aria-labelledby="books-tab"></div>
      <div class="tab-pane fade" id="div-friends-pill" role="tabpanel" aria-labelledby="friends-tab"></div>
  </div>
@endsection

@push('scripts')
    <script src="{{ mix('/js/navs.js') }}" defer ></script>
@endpush

{{-- data = son atributos personalizado
aria = para screen readers
role = para el navegador --}}
