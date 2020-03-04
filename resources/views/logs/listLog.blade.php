@extends('layouts.app')

@section('content')

    @if(session("message"))
    <div class="alert alert-success">{{session("message")}}</div>
    @endif
    <a class="btn btn-danger" href="{{ route('logs.print') }}">Imprimir en pdf</a>
    <table class="table table-hover">
    <tr class="bg-dark">   
        <th class="text-white">id <a href="{{ route('logs.listadoIdAsc') }}">↓</a></th> 
        <th class="text-white">Accion<a href="{{ route('logs.listadoAccion') }}">↓</a></th>
        <th class="text-white">Profesor</th>
    </tr>
    {{-- Listado de incidencias. --}}
    @foreach ($logs as $value)
    {{-- @if(Auth::user()->id == $value->user->id) --}}
        <tr class="table-light">

            <td scope="col">{{ $value->id }}</td>
            <td scope="col">{{ $value->accion }}</td>
            <td scope="col">{{ $value->user->name }}</td>

        </tr>
    {{-- @endif --}}

    {{-- <p>{{$value->descripcion}}</p>
    <p>{{$value->user->name}}</p> --}}

    @endforeach
    </table>
    {{ $logs->links() }}

@endSection