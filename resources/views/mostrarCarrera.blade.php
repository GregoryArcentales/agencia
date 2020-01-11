@extends('layouts.layout')
@section('contenido')
<div class="p-4">
<div class="container">
	<div class="row">
		<div class="col-8">
            <!--ESTE FOR MUESTRA LOS DATOS INDIVIDUALES DE LA CARRERA SELECIONADA-->
            @foreach ($carreras as $carrerasItem)
            <h1>{{$carrerasItem->nombre_cliente}} {{$carrerasItem->nombre_chofer}}</h1><br>
            @endforeach

				</div>
				<div class="col">
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#EditarCliente">
						<i class="fas fa-edit"></i>
					</button>
					{{-- @include('partials/editarCliente') --}}
					<button class="btn btn-danger glyphicon glyphicon-trash"><i class="fas fa-trash-alt"></i></button>
				</div>
			</div>
			<div>
				<button class="btn btn-secondary">Actividades <i class="fas fa-caret-square-down"></i></button>
			</div>
		</div>
		</div>
		@endsection
