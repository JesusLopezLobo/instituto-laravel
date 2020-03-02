@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Información detallada de '. $user->name) }}</div>

                <div class="card-body">
                    <h4><strong>Id:</strong> {{$user->id}}</h4>
                    <h4><strong>Nombre:</strong> {{$user->name}}</h4>
                    <h4><strong>Usuario:</strong> {{$user->usuario}}</h4>
                    <h4><strong>Email:</strong> {{$user->email}}</h4>
                    <h4><strong>Password:</strong> {{$user->password}}</h4>
                    <h4><strong>Rol:</strong> {{$user->rol}}</h4>
                    <h4><strong>Imagen:</strong> {{$user->imagen}}</h4>
                    <h4><strong>Creado en:</strong> {{$user->created_at}}</h4>
                    <h4><strong>Modificado en:</strong> {{$user->updated_at}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection