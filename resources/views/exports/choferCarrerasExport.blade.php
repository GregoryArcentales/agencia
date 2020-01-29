<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"> CHOFER: {{$chofer->nombre}} {{$chofer->apellido}}</th>
        </tr>
        <tr>
            <th scope="col" class="font-weight-bold">Cliente</th>
            <th scope="col" class="font-weight-bold">Dirección Salida</th>
            <th scope="col" class="font-weight-bold">Dirección Destino</th>
        </tr>
    </thead>
    <tbody class="tabInfoCarrera">
        @foreach ($carreras as $carrerasItem)
        <tr>
            <td>{{$carrerasItem->nombre_cliente}} {{$carrerasItem->apellido_cliente}}</td>
            <td>{{$carrerasItem->dir_salida}}</td>
            <td>{{$carrerasItem->dir_destino}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

