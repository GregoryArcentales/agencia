@extends('layouts.layout')
@section('contenido')
<div class="container px-5 d-flex flex-column">
   <div class="row">
        <form class="col-12 col-md-8 form-inline my-4">
            <input class="form-control mr-sm-2 col-12 col-md-6" name="buscarTexto" type="search" placeholder="Buscar por cliente, chofer o dirección..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
       {{--  <div class="col-4 py-4 d-flex justify-content-end">
        <a href="{{route('generarPdfCarreras')}}" class="btn btn-primary px-3 py-1 mx-2 btn-reporte">Generar PDF</a>
        <a href="{{route('exportExcel')}}" class="btn btn-primary px-3 py-1 btn-reporte">Exportar excel</a>
        </div> --}}
   </div>

   <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Chofer</th>
                    <th scope="col">Dirección salida</th>
                    <th scope="col">Dirección destino</th>
                    <th scope="col">Valor de Carrera</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="tabInfoCarrera">
                @forelse ($carrera as $carreraItem)
                <tr id="{{$carreraItem->id }}">
                    <td>{{ $carreraItem->nombre_cliente}} {{ $carreraItem->apellido_cliente}}</td>
                    <td class="nombreChofer {{ $carreraItem->chofer_baja}}">{{ $carreraItem->nombre_chofer}} {{ $carreraItem->apellido_chofer}}</td>
                    <td>{{ $carreraItem->dir_salida}}</td>
                    <td>{{ $carreraItem->dir_destino}}</td>
                    <td>{{ $carreraItem->val_carrera}}</td>
                    <td>
                    <a href="{{route('mostrarCarrera', $carreraItem)}}" class="btnInfoCarrera btn btn-primary">Ver detalles</a>
                    </td>
                </tr>
                @empty
                <h4>No hay Registros que mostrar</h4>
                @endforelse
            </tbody>
        </table>
   </div>
   <div class="paginate d-flex justify-content-center"> {{$carrera->links()}}</div>
</div>
@endsection


