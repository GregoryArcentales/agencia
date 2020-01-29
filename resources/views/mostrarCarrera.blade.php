@extends('layouts.layout')
@section('contenido')
<div class="p-4">
    <div class="container">
	    <div class="row">
		    <div class="col-12">
                <!--ESTE FOR MUESTRA LOS DATOS INDIVIDUALES DE LA CARRERA SELECIONADA-->
                @foreach ($carrera as $carrerasItem)
                <div class="contenedor-info-carrera row">
                    <div class="col-12 col-md-4">
                        <h5 class="datos-carrera font-weight-bold mb-2 mt-3 text-capitalize">Cliente: <span class="font-weight-normal">{{$carrerasItem->nombre_cliente}} {{$carrerasItem->apellido_cliente}}</span></h5>
                        <h5 class="datos-carrera font-weight-bold mb-2 text-capitalize">Chofer: <span class="font-weight-normal">{{$carrerasItem->nombre_chofer}} {{$carrerasItem->apellido_chofer}}</span></h5>
                        <h5 class="datos-carrera font-weight-bold mb-2 text-capitalize">Dirección de salida: <span class="font-weight-normal">{{$carrerasItem->dir_salida}}</span></h5>
                        <h5 class="datos-carrera font-weight-bold mb-2 text-capitalize">Dirección de destino: <span class="font-weight-normal">{{$carrerasItem->dir_destino}}</span></h5>
                        <h5 class="datos-carrera font-weight-bold mb-2 text-capitalize">Fecha: <span class="font-weight-normal">{{$carrerasItem->created_at->format('d/m/y')}}</span></h5>
                        <h5 class="datos-carrera font-weight-bold mb-2">Valor de la carrera: $ <span class="font-weight-normal valor-carrera">{{$carrerasItem->val_carrera}}</span></h5>
                        <h5 class="datos-carrera font-weight-bold mb-2">Ganancias: $ <span class="font-weight-normal">{{$carrerasItem->ganancia_carrera}}</span></h5>
                    </div>
                    <div class="col-12 col-md-5">
                        <h3 class="font-weight-bold text-center mt-3 mt-md-1">Gastos</h3>
                        <div class="list-gastos">
                            <ul class="list-group d-flex-column justify-content-center align-items-center">
                             @forelse ($gastos as $gasto)
                                 <li class="list-group-item text-center shadow px-3 py-2 mb-1 col-8">{{$gasto->nombre_gasto}} - $ {{$gasto->gasto}}</li>
                             @empty
                                 <p class="text-center">Aun no se han asignado gastos</p>
                             @endforelse
                         </ul>
                       </div>
                       @if ($carrerasItem->gasto_carrera !=0)
                        <div class="total-gastos mt-3">
                            <h4 class="text-center">Total de gastos: </h4>
                           <p class="text-center font-weight-bold "> $ {{$carrerasItem->gasto_carrera}}</p>
                        </div>
                       @endif

                       <div class="icon-plus my-3 text-center">
                           <a href="#" data-toggle="modal" data-target="#Gasto">
                               <i class="fas fa-plus-circle"></i>
                               Agregar Gasto
                            </a>
                            @include('partials/gasto')
                        </div>

                        <form class="mt-4 text-center" method="POST" action="{{route('actualizarCarrera', $carrerasItem)}}">
                        @csrf @method('PUT')
                        <div class="container-gastos">

                        </div>
                            <input id="contadorGastos" type="hidden" name="contadorGastos" value="">
                            <input id="totalGastos" type="hidden" name="totalGastos" value="">
                            <input id="totalGanancia" type="hidden" name="totalGanancia" value="">
                            <button type="submit" class="btn btn-primary mt-2 btn-submit-gasto" disabled="disabled">Generar Ganancia</button>
                        </form>
                   </div>
                   <div class="col-12 col-md-3 p-0 text-center text-md-right my-5 my-md-0">
                        <a href="{{route('generarPdfCarreras', $carrerasItem)}}" class="btn btn-primary px-3 py-1 my-2 btn-reporte">Generar PDF</a>
                        <a href="{{route('exportExcel', $carrerasItem)}}" class="btn btn-primary px-3 py-1 btn-reporte">Exportar excel</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <a href="{{url()->previous()}}" class="btn btn-primary btn-volver btn-volver px-3 py-1 mb-3">Volver</a>
</div>
@endsection
