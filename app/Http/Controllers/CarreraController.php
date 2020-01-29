<?php

namespace App\Http\Controllers;


use App\Carrera;
use App\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CarrerasExport;
use App\Gasto;
use PhpParser\Node\Expr\AssignOp\Concat;

class CarreraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $carrera = Carrera::join('clientes', 'cliente_id', '=',  'clientes.id')
                ->join('chofers', 'chofer_id', '=', 'chofers.id')
                ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer', 'chofers.baja as chofer_baja')
                ->buscadorCarrera($request->get('buscarTexto'))
                ->orderBy('id','desc')
                ->paginate(6);
        }
        return view('carrera', ['carrera' => $carrera]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreCliente = Cliente::where('nombre',$request->nombreCliente)->value('id');

        $carrera = new Carrera();
        $carrera->cliente_id = $nombreCliente;
        $carrera->chofer_id = $request->select;
        $carrera->dir_destino = $request->dirDestino;
        $carrera->dir_salida = $request->dirSalida;
        $carrera->val_carrera = $request->valCarrera;
        //$carrera->gasto_carrera = $request->gastoCarrera;
        $carrera->save();

        return redirect()->route('carreraPrincipal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = Carrera::findOrFail($id)
            ->join('clientes', 'carreras.cliente_id', '=', 'clientes.id')
            ->join('chofers', 'carreras.chofer_id', '=', 'chofers.id')
            ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer')
            ->where('carreras.id', $id)
            ->get();
        $gastos = Gasto::join('carreras', 'carrera_id', '=', 'carreras.id')
            ->where('carrera_id', $id)->get();

        return view('mostrarCarrera', compact([
            'carrera',
            'gastos'
            ]));
    }

    public function generarPdf($id)
    {
        $carreras = Carrera::join('clientes', 'cliente_id', '=',  'clientes.id')
            ->join('chofers', 'chofer_id', '=', 'chofers.id')
            ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer')
            ->orderBy('id','desc')
            ->where('carreras.id', $id)
            ->get();

        $pdf = PDF::loadView('layouts.CarrerasAllPdf', compact('carreras'));
        return $pdf->stream();
    }

    public function export($id)
    {
        return Excel::download(new CarrerasExport($id), 'carreras.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ganancia = 0;
        $gastos = 0;
        $valor = 0;
        $gastoGanancia = Carrera::findOrFail($id)
            ->join('clientes', 'carreras.cliente_id', '=', 'clientes.id')
            ->join('chofers', 'carreras.chofer_id', '=', 'chofers.id')
            ->select('carreras.gasto_carrera', 'carreras.ganancia_carrera', 'val_carrera')
            ->where('carreras.id', $id)
            ->get();
            foreach ($gastoGanancia as $value) {
                $ganancia = $value->ganancia_carrera;
                $gastos = $value->gasto_carrera;
                $valor = $value->val_carrera;
            }
            //return $valor - $request;

        $carrera = Carrera::findOrFail($id);
        $carrera->gasto_carrera = $request->totalGastos + $gastos;
        $carrera->ganancia_carrera = $valor - $carrera->gasto_carrera;
        $carrera->save();

        for ($i=0; $i <= $request->contadorGastos; $i++) {
            $nombre = 'nombreGasto' . $i;
            $cantidadGasto = 'inputGasto' . $i;
            $gasto = new Gasto;
            $gasto->carrera_id = $id;
            $gasto->nombre_gasto = $request->$nombre;
            $gasto->gasto = $request->$cantidadGasto;
            $gasto->save();
        }
        return redirect()->route('mostrarCarrera', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
