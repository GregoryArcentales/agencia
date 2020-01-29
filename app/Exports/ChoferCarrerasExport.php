<?php

namespace App\Exports;

use App\Carrera;
use App\Chofer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ChoferCarrerasExport implements FromView
{

    protected $carreras;

    public function __construct($carreras)
    {
        $this->carreras = $carreras;
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
        ->idChofer($this->carreras)
        ->get();
    } */

    public function view(): View
    {
        return view('exports.choferCarrerasExport', [
            'carreras' => Carrera::join('clientes', 'cliente_id', '=',  'clientes.id')
            ->join('chofers', 'chofer_id', '=', 'chofers.id')
            ->select('carreras.*','clientes.nombre as nombre_cliente', 'clientes.apellido as    apellido_cliente', 'chofers.nombre as nombre_chofer', 'chofers.apellido as apellido_chofer')
            ->orderBy('id','asc')
            ->idChofer($this->carreras)
            ->get(),
            'chofer' => Chofer::findOrFail($this->carreras)
        ]);
    }

}
