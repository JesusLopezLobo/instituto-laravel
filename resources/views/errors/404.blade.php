@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Página no encontrada'))

@section('image')
<style>
    #apartado-derecho{
        text-align:center;
    }
    ul{
        text-decoration: none !important;
        list-style: none;
        color: black;
        font-weight: bold;
    }
</style>
<div id="apartado-derecho" style="background-color: #E4E01A;" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    <h2>Encuentra lo que buscas en nuestro menú:</h2><br><br><br>
    <h1>No se ha encontrado la página</h1>    
</div>
@endsection

@section('message', __('No hemos encontrado la página que buscas.'))