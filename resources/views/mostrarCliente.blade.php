@extends('layouts.layout')
@section('contenido')
<div class="p-3 h-100">
	<div class="container h-100">
		    <div class="row">
    			<!--Div para mostrar los datos del cliente-->
    			<div class="col-8">
    				<div class="info-contenido">
    				    <h1 class="m-0 font-weight-bold">{{$cliente->nombre}} {{$cliente->apellido}}</h1>
        				<div class="info-contacto pb-2">
                            <h4 class="m-0 pt-3 pb-2 font-weight-bold">Infomación de contacto:</h4>
        				    <p>Teléfono: {{$cliente->telefono}}<p>
            				<p>Correo: {{$cliente->email}}<d>
        				</div>
    				</div>
    			</div>
    					<!--Boton para editar datos del cliente-->
    					<div class="col">
                            <div class="row justify-content-end py-2">
                              <button class="btn btn-warning glyphicon glyphicon-pencil font-weight-bold text-white my-2 mx-2" data-toggle="modal" data-target="#EditarCliente">
                               <i class="fas fa-edit"></i><spam class="d-none d-md-inline-block"> Editar </spam>
                             </button>
        						@include('partials/editarCliente')
        						<!--Boton para eliminar datos del cliente-->
                                <button class="btn btn-danger glyphicon glyphicon-trash font-weight-bold mx-2 my-2" data-toggle="modal"
                                data-target="#EliminarCliente">
                                <i class="fas fa-trash-alt"></i><spam class="d-none d-md-inline-block"> Eliminar </spam>
                              </button>
                                @include('partials/eliminarCliente')
    						</div>
    					</div>
    				</div>
                    <!--Botón para ver las ACTIVIDADES-->
                    <div class="container-buscar">
                        <form class="form-inline search d-block d-md-none d-flex">
                          <input class="form-control form-control-sm w-75 search-i" type="text" placeholder="Lugar, nombre de chofer" name="buscarCarrera" aria-label="Search">
                          <i class="fas fa-search ml-3" aria-hidden="true"></i>
                        </form>
                      </div>
                      <div class="row">
                        <div class="col-8 col-sm-4">
                          <button class="btn btn-secondary my-2 btn-actividades p-2">Ultimas carreras
                            <div class="d-inline-flex justify-content-center align-items-center flecha"><i class="fas fa-caret-square-down"></i></div>
                          </button>
                        </div>
                        <div class="col-4 col-sm-8">
                         <div class="h-100 d-flex align-items-center">
                          <form class="form-inline search d-none d-md-block">
                            <input class="form-control form-control-sm mr-3 w-75 search-i" type="text" placeholder="Lugar, nombre de chofer" name="buscarCarrera" aria-label="Search">
                            <i class="fas fa-search" aria-hidden="true"></i>
                          </form>

                        <div class="flex-grow-1 d-none d-lg-block">
                                 <a href="{{route('generarPdfCliente', $cliente)}}" class="btn btn-primary px-3 py-1 mx-2 btn-reporte">Generar PDF</a>
                                <a href="{{route('clienteExportExcel', $cliente)}}" class="btn btn-primary px-3 py-1 btn-reporte">Exportar excel</a>
                             </div>
                           </div>
                       </div>
                    </div>
    				<!--Se crea la tabla en dónde se mostrarán las actividades del cliente-->
    				<div id="actividad" class="actividad mostrar-actividad">
                        <div class="table-responsive">
    					<table class="table table-hover">
    						<thead>
    							<tr>
                                    <th scope="col">Chofer</th>
                                    <th scope="col">Dirección Salida</th>
    								<th scope="col">Dirección Destino</th>
    							</tr>
    						</thead>
    						<tbody class="tabInfoCarrera">
    							@forelse ($carreras as $carrerasItem)
    							<tr id="{{$carrerasItem->id}}">
                                    <td class="nombreChofer {{ $carrerasItem->chofer_baja}}">{{$carrerasItem->nombre_chofer}} {{$carrerasItem->apellido_chofer}}</td>
                                    <td>{{$carrerasItem->dir_salida}}</td>
                                    <td>{{$carrerasItem->dir_destino}}</td>
                                    <td>
                                    <a href="{{route('mostrarCarrera', $carrerasItem)}}" class="btnInfoCarrera btn btn-primary">Ver detalles</a>
                                    </td>
    							</tr>
    							@empty
    							<h4>No hay Registros que mostrar</h4>
    							@endforelse
    						</tbody>
                        </table>
                        </div>
                        <div class="flex-grow-1 d-flex justify-content-end d-block d-lg-none mt-2 mb-3">
                            <a href="{{route('generarPdfCliente', $cliente)}}" class="btn btn-primary px-3 py-1 mx-2 btn-reporte">Generar reporte</a>
                            <a href="{{route('clienteExportExcel', $cliente)}}" class="btn btn-primary px-3 py-1 btn-reporte">Ver Todo</a>
                        </div>
                        <div class="paginate d-flex justify-content-center mb-5 mb-md-0">
                            {{$carreras->links()}}
                        </div>
                    </div>
                    <a href="{{url()->previous()}}" class="btn btn-primary btn-volver btn-volver px-3 py-1">Volver</a>
			</div>
		</div>
		@endsection
