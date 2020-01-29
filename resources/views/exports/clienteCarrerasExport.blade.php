<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"> CLIENTE: {{$cliente->nombre}} {{$cliente->apellido}}</th>
        </tr>
        <tr>
            <th scope="col" class="font-weight-bold">Chofer</th>
            <th scope="col" class="font-weight-bold">Dirección Salida</th>
            <th scope="col" class="font-weight-bold">Dirección Destino</th>
        </tr>
    </thead>
    <tbody class="tabInfoCarrera">
        @foreach ($carreras as $carrerasItem)
        <tr>
            <td>{{$carrerasItem->nombre_chofer}} {{$carrerasItem->apellido_chofer}}</td>
            <td>{{$carrerasItem->dir_salida}}</td>
            <td>{{$carrerasItem->dir_destino}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
