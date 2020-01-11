@extends('layouts.layout')
@section('contenido')
<div class="p-3 h-100">
<div class="container h-100">
	<div class="row">
		<div class="col-8">
			<div class="info-contenido">
                <h1 class="m-0 font-weight-bold">{{$chofer->nombre}} {{$chofer->apellido}}</h1>
                <div class="info-contacto pb-2">
                    <h4 class="m-0 pt-3 pb-2 font-weight-bold">Infomación de contacto:</h4>
                    <p>Teléfono: {{$chofer->telefono}}<p>
                    <p>Correo: {{$chofer->email}}<p>
                </div>
            </div>
		</div>
				<div class="col">
					<div class="row justify-content-end py-2">
					    <button class="btn btn-warning glyphicon glyphicon-pencil font-weight-bold text-white mx-2" data-toggle="modal" data-target="#EditarCliente">
    						<i class="fas fa-edit"></i> Editar
    					</button>
    					@include('partials/editarChofer')
                        <button class="btn btn-danger glyphicon glyphicon-trash font-weight-bold mr-2" data-toggle="modal"
                        data-target="#EliminarChofer">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                        @include('partials/eliminarChofer')
					</div>
				</div>
            </div>
                <!--Botón para ver las ACTIVIDADES-->
                <div class="row">
                    <div class="col-4">
                        <button class="btn btn-secondary my-3 btn-actividades p-2">Ultimas carreras
                                <div class="d-inline-flex justify-content-center align-items-center flecha"><i class="fas fa-caret-square-down"></i></div>
                        </button>
                    </div>
                   <div class="col-8">
                       <div class="h-100 d-flex align-items-center">
                            <form class="form-inline search">
                                    <input class="form-control form-control-sm mr-3 w-75 search-i" type="text" placeholder="Lugar, nombre de cliente" name="buscarCarrera" aria-label="Search">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                            </form>

                            <div class="flex-grow-1 d-flex justify-content-end">
                                <a href="#" class="btn btn-primary px-3 py-1 mx-2 btn-reporte">Generar reporte</a>
                                <a href="#" class="btn btn-primary px-3 py-1 btn-reporte">Ver Todo</a>
                            </div>
                       </div>
                   </div>
                </div>
            		<!--Se crea la tabla en dónde se mostrarán las actividades del cliente-->
				<div id="actividad" class="actividad mostrar-actividad">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Cliente</th>
								<th scope="col">Dirección Destino</th>
								<th scope="col">Dirección Salida</th>
							</tr>
						</thead>
						<tbody class="tabCarrera">
							@forelse ($carreras as $carrerasItem)
							<tr>
								<th scope="row">{{$carrerasItem->id}}</th>
								<td>{{$carrerasItem->nombre_cliente}}</td>
								<td>{{$carrerasItem->dir_destino}}</td>
								<td>{{$carrerasItem->dir_salida}}</td>
							</tr>
							@empty
							<h4>No hay Registros que mostrar</h4>
							@endforelse
						</tbody>
                    </table>
                    <div class="paginate d-flex justify-content-center"> {{$carreras->links()}}</div>
                </div>
                <a href="{{url()->previous()}}" class="btn btn-primary btn-volver btn-volver px-3 py-1">Volver</a>
		</div>
		</div>
		@endsection
