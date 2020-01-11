<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Cliente;
use App\Http\Requests\FormularioCarreraRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                ->select('carreras.*', 'clientes.nombre as nombre_cliente', 'chofers.nombre as nombre_chofer', 'chofers.baja as chofer_baja')
                ->buscadorCarrera($request->get('buscarTexto'))
                ->orderBy('id','desc')
                ->paginate(5);
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
        $nombreCliente = DB::table('clientes')->where('nombre',$request->nombreCliente)->value('id');
        $carrera = new Carrera();
        $carrera->cliente_id = $nombreCliente;
        $carrera->chofer_id = $request->select;
        $carrera->dir_destino = $request->dirDestino;
        $carrera->dir_salida = $request->dirSalida;
        $carrera->val_carrera = $request->valCarrera;
        $carrera->gasto_carrera = $request->gastoCarrera;
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
            ->select('carreras.*','clientes.nombre as nombre_cliente','chofers.nombre as nombre_chofer')
            ->where('carreras.id', $id)
            ->get();

        return $carrera;
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
        //
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
