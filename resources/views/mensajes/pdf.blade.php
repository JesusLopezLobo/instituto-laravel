<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

    {{--             <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header"> --}}
                                    <table class="table table-hover">
                                        <tr class="bg-dark">   
                                            <th class="text-white">Id</th> 
                                            <th class="text-white">Mensaje</th>
                                            <th class="text-white">Profesor</th>
                                        </tr>
                                {{-- Listado de incidencias. --}}
                                    @foreach ($mensajes as $value)
                                        {{-- @if(Auth::user()->id == $value->user->id) --}}
                                            <tr class="table-light">

                                                <td scope="col">{{ $value->id }}</td>
                                                <td scope="col">{{ $value->mensaje }}</td>
                                                <td scope="col">{{ $value->user->name }}</td>
                                            </tr>
                                        {{-- @endif --}}
        
                                        {{-- <p>{{$value->descripcion}}</p>
                                        <p>{{$value->user->name}}</p> --}}
                                        
                                    @endforeach
                                </table>
    {{--                             </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
    </div>
    </div>
</body>
</html>