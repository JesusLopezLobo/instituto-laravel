@extends('layouts.app')

@section('content')


    @if(session("message"))
        <div class="alert alert-success">{{session("message")}}</div>
    @endif
    <a  class="btn btn-danger" href="{{ route('user.print') }}">Imprimir en pdf</a>
    <table class="table table-hover">
        <tr class="bg-dark">   
            <th class="text-white">id</th> 
            <th class="text-white">Nombre</th>
            <th class="text-white">Email</th>
            <th class="text-white">Aula</th>
            <th></th>
        </tr>
    {{-- Listado de incidencias. --}}
    @foreach ($user as $value)
        {{-- @if(Auth::user()->id == $value->user->id) --}}
            <tr class="table-light">

                <td scope="col">{{ $value->id }}</td>
                <td scope="col">{{ $value->name }}</td>
                <td scope="col">{{ $value->email }}</td>
                <td scope="col">{{ $value->aula }}</td>
                <td> 
                    @if(Auth::user()->rol == "admin")
                        <a href="{{ route('user.delete', ['id' => $value->id]) }}" onclick="return confirm('¿Estas seguro que deseas eliminar la incidencia?')" class="btn btn-danger">ELIMINAR</a>
                        <a href="{{ route('user.detalles', ['id' => $value->id]) }}" class="btn btn-primary">DETALLES</a>
                    @endif
                    <a href="{{ route('mensajes', ['id' => $value->id]) }}" class="btn btn-success">MENSAJES</a>
                </td>

            </tr>
        {{-- @endif --}}

        {{-- <p>{{$value->descripcion}}</p>
        <p>{{$value->user->name}}</p> --}}
        
    @endforeach
    </table>
    {{ $user->links() }}

@endSection