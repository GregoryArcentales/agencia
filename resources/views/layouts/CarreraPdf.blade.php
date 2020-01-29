<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carreras PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="">
    <h3 class="mb-5">Carreras</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="font-weight-bold">Cliente</th>
                <th scope="col" class="font-weight-bold">Chofer</th>
                <th scope="col" class="font-weight-bold">Dirección Salida</th>
                <th scope="col" class="font-weight-bold">Dirección Destino</th>
                <th scope="col" class="font-weight-bold">Fecha</th>
                <th scope="col" class="font-weight-bold">Valor de la carrera</th>
                <th scope="col" class="font-weight-bold">Total de gastos</th>
                <th scope="col" class="font-weight-bold">Total de ganacias</th>
        </thead>
        <tbody class="tabInfoCarrera">
            @foreach ($carrera as $carrerasItem)
            <tr>
                <td>{{$carrerasItem->nombre_cliente}} {{$carrerasItem->apellido_cliente}}</td>
                <td>{{$carrerasItem->nombre_chofer}} {{$carrerasItem->apellido_chofer}}</td>
                <td>{{$carrerasItem->dir_salida}}</td>
                <td>{{$carrerasItem->dir_destino}}</td>
                <td>{{$carrerasItem->created_at->format('d/m/y')}}</td>
                <td>{{$carrerasItem->val_carrera}}</td>
                <td>{{$carrerasItem->gasto_carrera}}</td>
                <td>{{$carrerasItem->ganancia_carrera}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
