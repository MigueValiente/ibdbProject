@extends('layouts.app')

@section('title', 'About IBDB')

@section('content')
<h1>Página de inicio</h1>
{{-- <div id="carousel" class="carousel slide w-100 mh-20 m-auto" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid w-100 mh-20" src="http://lorempixel.com/1000/500/food/1" alt="Primera imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Primera Imagen</h5>
                <p>Imagen de Prueba de comida</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100 mh-20" src="http://lorempixel.com/1000/500/food/2" alt="Segunda imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Segunda Imagen</h5>
                <p>Imagen de Prueba de comida</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100 mh-20" src="http://lorempixel.com/1000/500/food/3" alt="Tercera imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tercera Imagen</h5>
                <p>Imagen de Prueba de comida</p>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel4" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel4" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
     --}}
    <div id="carousel4" class="carousel slide w-100 mh-30 m-auto" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel4" data-slide-to="0" class="active"></li>
        <li data-target="#carousel4" data-slide-to="1"></li>
        <li data-target="#carousel4" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid w-100" src="http://lorempixel.com/900/300/food/1n" alt="Primera imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Primera Imagen</h5>
                <p>Imagen de Prueba de Comida</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100" src="http://lorempixel.com/900/300/food/2" alt="Segunda imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Segunda Imagen</h5>
                <p>Imagen de Prueba de Comida</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100" src="http://lorempixel.com/900/300/food/3" alt="Tercera imagen">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tercera Imagen</h5>
                <p>Imagen de Prueba de Comida</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel4" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel4" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endsection
