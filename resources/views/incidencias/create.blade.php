@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session("message"))
            <div class="alert alert-success">{{session("message")}}</div>
            @endif

            <div class="card">
                <div class="card-header"> 
                    Crear nueva incidencia.
                </div>

                <div class="card-body">
                <form action="{{ route('incidencias.save') }}" method="post">
                        @csrf

                        <div class="form-group row">

                            <label for="aula" class="col-md-3 col-form-label text-md-right">Aula</label>
                            <div class="col-md-7">
                                <input type="text" name="aula" class="form-control" required>

                                @if($errors->has('aula'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('aula')}}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="descripcion " class="col-md-3 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-7 " >
                                <textarea name="descripcion" class="form-control" required></textarea>

                                @if($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('descripcion')}}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>   
                        
                        <div class="form-group row">

                            <label for="importancia" class="col-md-3 col-form-label text-md-right">Importancia</label>

                            <div class="col-md-7">
                            <select class="browser-default custom-select" name="importancia">
                                <option value="1">Leve</option>
                                <option value="2">Grave</option>
                                <option value="3">Muy grave</option>
                            </select>

                                @if ($errors->has('importancia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('importancia') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>    

                        <div class="col-md-6 offset-md-3">
                            <input type="submit" class="btn btn-primary" value="Crear Incidencias">
                        </div>


                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

@endSection