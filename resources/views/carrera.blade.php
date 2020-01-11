@extends('layouts.layout')
@section('contenido')
<div class="container px-5 d-flex flex-column">
    <form class="form-inline my-4">
        <input class="form-control mr-sm-2 col-10 col-md-4" name="buscarTexto" type="search" placeholder="Ingrese un nombre de cliente o chofer..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Chofer</th>
                <th scope="col">Dirección salida</th>
                <th scope="col">Dirección destino</th>
                <th scope="col">Valor de Carrera</th>
                <th scope="col">Gastos</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="tabInfoCarrera">
            @forelse ($carrera as $carreraItem)
            <tr id="{{$carreraItem->id }}">
                <td>{{ $carreraItem->nombre_cliente}}</td>
                <td class="nombreChofer {{ $carreraItem->chofer_baja}}">{{ $carreraItem->nombre_chofer}}</td>
                <td>{{ $carreraItem->dir_salida}}</td>
                <td>{{ $carreraItem->dir_destino}}</td>
                <td>{{ $carreraItem->val_carrera}}</td><!--Se muestra el "valor de la carrera" en la tabla-->
                <td>{{ $carreraItem->gasto_carrera}}</td><!--Se muestra el "gasto de la carrera" en la tabla-->
                <td>
                    <a href="#InfoCarrera" class="btnInfoCarrera btn btn-primary" data-toggle="modal">Ver más</a>
                    @include('partials/InfoCarrera')
                </td>
            </tr>
            @empty
            <h4>No hay Registros que mostrar</h4>
            @endforelse
        </tbody>
    </table>
   <div class="paginate d-flex justify-content-center"> {{$carrera->links()}}</div>
</div>
@endsection


