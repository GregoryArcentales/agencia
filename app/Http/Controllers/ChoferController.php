<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Chofer;
use App\Http\Requests\FormularioClienteRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ChoferCarrerasExport;

class ChoferController extends Controller
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

        $choferes = Chofer::buscadorChofer($request->get('buscarTexto'))->activo()->orderBy('id','desc')
        ->paginate(6);
        return view('chofer', [
            'chofer' => $choferes
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crearChofer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormularioClienteRequest $request)
    {
        $chofer = new Chofer();
        $chofer->nombre = $request->name;
        $chofer->apellido = $request->surname;
        $chofer->telefono = $request->number;
        $chofer->email = $request->email;
        $chofer->save();
            return redirect()->route('choferPrincipal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $chofer = Chofer::findOrFail($id);
        $carreras = Carrera::join('clientes', 'cliente_id', '=', 'clientes.id')
            ->join('chofers', 'chofer_id', '=', 'chofers.id')
            ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer')
            ->buscadorCarreraChofer($request->get('buscarCarrera'))
            ->idChofer($chofer->id)
            ->orderBy('id','desc')
            ->paginate(4);
        //return $carreras;
        return view('mostrarChofer',[
            'carreras' => $carreras,
            'chofer' => $chofer
        ]);
    }

    public function generarPdf($id)
    {
        $chofer = Chofer::findOrFail($id);
        $carreras = Carrera::join('clientes', 'cliente_id', '=', 'clientes.id')
            ->join('chofers', 'chofer_id', '=', 'chofers.id')
            ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer')
            ->idChofer($id)
            ->orderBy('id','desc')
            ->get();
            $pdf = PDF::loadView('layouts.choferCarrerasPdf', compact(['carreras', 'chofer']));
            return $pdf->stream();
    }

    public function export($id)
    {
        return Excel::download(new ChoferCarrerasExport($id), 'cliente-carreras.xlsx');
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
        $chofer = Chofer::findOrFail($id);
        $chofer->nombre = $request->nombre;
        $chofer->apellido = $request->apellido;
        $chofer->telefono = $request->number;
        $chofer->email = $request->email;
        $chofer->save();
        return redirect()->route('choferPrincipal');
    }

    public function bajaChofer($id)
    {
        $chofer = Chofer::findOrFail($id);
        $chofer->baja = 1;
        $chofer->save();
        return redirect()->route('choferPrincipal');
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
