<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carreras de cliente PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="">
    <h3 class="mb-5">Carreras de {{$cliente->nombre}} {{$cliente->apellido}}</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Chofer</th>
                <th scope="col">Direccion Salida</th>
                <th scope="col">Direccion Destino</th>
                <th scope="col">Fecha</th>
                <th scope="col">Valor de la carrera</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($carreras as $carrerasItem)
                <tr id="{{$carrerasItem->id}}">
                    <td>{{$carrerasItem->nombre_cliente}} {{$carrerasItem->apellido_cliente}}</td>
                    <td class="nombreChofer {{ $carrerasItem->chofer_baja}}">{{$carrerasItem->nombre_chofer}} {{$carrerasItem->apellido_chofer}}</td>
                    <td>{{$carrerasItem->dir_salida}}</td>
                    <td>{{$carrerasItem->dir_destino}}</td>
                    <td>{{$carrerasItem->created_at->format('d-m-y')}}</td>
                    <td>{{$carrerasItem->val_carrera}}</td>
                </tr>
                @empty
                <h4>No hay Registros que mostrar</h4>
                @endforelse
            </tbody>
          </table>
    </div>
</body>
</html>
