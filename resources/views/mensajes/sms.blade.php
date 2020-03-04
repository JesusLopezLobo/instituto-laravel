@extends('layouts.app')

@section('content')

<a class="btn btn-danger" href="{{ route('mensaje.print') }}">Imprimir en pdf</a>
    {{-- Listado de mensajes. --}}
    @foreach ($sms as $value)
        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($value->id_profesor == Auth::User()->id && $value->id_profesorEnviar == $id_enviar)
                    <div class="alert alert-success">
                    <p class="text-right" style="margin-right: 10px">{{ $value->mensaje }}<a class="btn btn-danger" href="{{ route('mensajes.delete', ['id' => $value->id]) }}">X</a></p>
                    </div>
                @endif
                @if($value->id_profesorEnviar == Auth::User()->id && $value->id_profesor == $id_enviar)
                    <div class="alert alert-info">
                    <p class="text-left" style="margin-left: 10px"><a class="btn btn-danger" onclick="return confirm('¿Estas seguro que deseas eliminar la incidencia?')" href="{{ route('mensajes.delete', ['id' => $value->id]) }}">X</a>   {{ $value->mensaje }}º</p>
                    </div>
                 @endif
            </div>
        </div>
    </div> 
    @endforeach


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
    
                <div class="card">
                    <div class="card-header"> 
                        Crear nuevo mensaje.
                    </div>

                   
    
                    <div class="card-body">
                    <form action="{{ route('mensajes.save') }}" method="post">
                            @csrf
    
                            <input type="hidden" name="id_enviar" value="{{ $id_enviar}}">

                            <div class="form-group row">
    
                                <label for="mensaje" class="col-md-3 col-form-label text-md-right">Mensajes</label>
                                <div class="col-md-7 " >
                                    <textarea name="mensaje" class="form-control" required></textarea>
    
                                    @if($errors->has('mensaje'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('mensaje')}}</strong>
                                        </span>
                                    @endif
                                </div>
    
                            </div> 

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- $user->links() --}}

@endSection