@extends('layouts.layout')
@section('contenido')
<div class="container px-5">
    <form class="form-inline my-4 d-none d-md-block">
        <input class="form-control mr-sm-2 col-10 col-md-4" name="buscarTexto" type="search" placeholder="Ingrese un nombre o apellido" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

    <form class="form-inline search d-block d-md-none d-flex my-4">
        <input class="form-control form-control-sm w-75 search-i" type="text" name="buscarCarrera" placeholder="Ingrese un nombre o apellido"
        aria-label="Search">
        <i class="fas fa-search ml-3" aria-hidden="true"></i>
    </form>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Más información</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($chofer as $choferItem)
                <tr>
                    <td>{{ $choferItem->nombre}}</td>
                    <td>{{ $choferItem->apellido}}</td>
                    <td>{{ $choferItem->telefono}}</td>
                    <td>{{ $choferItem->email}}</td>
                    <td>
                        <a href="{{route('mostrarChofer', $choferItem)}}" class="btn btn-primary">Ver más</a>
                    </td>
                </tr>
                @empty
                <h4>No hay Registros que mostrar</h4>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection



