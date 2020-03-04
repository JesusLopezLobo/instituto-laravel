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
            </tr>
        {{-- @endif --}}

        {{-- <p>{{$value->descripcion}}</p>
        <p>{{$value->user->name}}</p> --}}
        
    @endforeach
    </table>

</body>
</html>