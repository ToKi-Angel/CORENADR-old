@extends('layouts/main')
<style>
    .card {
        background-color: #f8f9fa;
        border-radius: 20px;
        margin: 20px;
    }
</style>
@section('contenido')
    <p class="fs-2 text-center mt-4">
       CORENADR
    <div class="card-deck">
        <div class="card mb-3 mt-4 border-info" style="display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded-start" alt="Logo" style="background-color: #ffffff; max-width: 600px;">
            <div class="card-body" style="background-color: #000000; color: #ffffff;">
                <h5 class="card-title text-center mt-4">¿Quiénes somos?</h5>
                <p class="card-text">CORENADR es una empresa que se creó dentro del Tecnológico Nacional De Milpa Alta II en el año 2023.</p>
                <p class="card-text">Somos desarrolladores que se encargan de realizar diferentes proyectos de páginas web.</p>
                <p class="card-text"><small class="text-muted">Contáctanos:</small></p>
                
                <div class="text-right">
                    <img src="{{ asset('img/WhatsApp.png') }}" alt="Icono" style="width: 40px; height: auto;"> +52 5514786436
                </div>
                <div class="text-right">
                    <img src="{{ asset('img/Facebook.svg.webp') }}" alt="Icono" style="width: 40px; height: auto;"> <a href="https://www.facebook.com/arturo.nunezevangelista">Arturo N</a>
                </div>
            </div>
            <p></p>
        </div>
    </div>
    

    
@endsection


