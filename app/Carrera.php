<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{

    protected $filleable = ['cliente_id', 'chofer_id', 'dir_destino', 'dir_salida', 'val_carrera', 'gasto_carrera'];

    public function chofer()
    {
        return $this->belongsTo(Chofer::class,'chofer_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    //scope

    public function scopeBuscadorCarrera($query, $nombre)
    {
        if ($nombre != '') {
            return $query->where('clientes.nombre','LIKE','%'.$nombre.'%')
            ->orWhere('chofers.nombre','LIKE','%'.$nombre.'%');
        }
    }

    public function scopeBuscadorCarreraCliente($query, $nombre)
    {
                if ($nombre != '') {
                    $this->_nombreBuscado = $nombre;
                    return $query->where(function($query){
                            $nombre = $this->_nombreBuscado;
                            $query->where('dir_destino','LIKE','%'.$nombre.'%')
                                    ->orWhere('dir_salida','LIKE','%'.$nombre.'%')
                                    ->orWhere('chofers.nombre','LIKE','%'.$nombre.'%');
                    });
                }
    }

    public function scopeIdCliente($query, $id)
    {
        return $query->where('clientes.id',$id);
    }


    public function scopeBuscadorCarreraChofer($query, $nombre)
    {
                if ($nombre != '') {
                    $this->_nombreBuscado = $nombre;
                    return $query->where(function($query){
                            $nombre = $this->_nombreBuscado;
                            $query->where('dir_destino','LIKE','%'.$nombre.'%')
                                    ->orWhere('dir_salida','LIKE','%'.$nombre.'%')
                                    ->orWhere('clientes.nombre','LIKE','%'.$nombre.'%');
                    });
                }
    }

    public function scopeIdChofer($query, $id)
    {
        return $query->where('chofers.id',$id);
    }

}
