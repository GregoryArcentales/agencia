<?php

namespace App\Exports;

use App\Carrera;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CarrerasExport implements FromView
{
    protected $carrera;

    public function __construct($carrera)
    {
        $this->carrera = $carrera;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    /* public function collection()
    {
        return Carrera::join('clientes', 'cliente_id', '=',  'clientes.id')
                ->join('chofers', 'chofer_id', '=', 'chofers.id')
                ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer')
                ->orderBy('id','asc')
                ->get();
    } */

    public function view(): View
    {
        return view('exports.carreraExport', [
            'carrera' => Carrera::findOrFail($this->carrera)
            ->join('clientes', 'cliente_id', '=',  'clientes.id')
            ->join('chofers', 'chofer_id', '=', 'chofers.id')
            ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer')
            ->orderBy('id','asc')
            ->where('carreras.id', $this->carrera)
            ->get()
        ]);
    }


}
