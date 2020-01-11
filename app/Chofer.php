<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $fillable  = ['nombre','apellido','telefono','email'];

    //scope

    public function scopeBuscadorChofer($query, $nombre)
    {
        if ($nombre != '') {
            $this->_nombreBuscado = $nombre;
                return $query->where(function($query){
                    $nombre = $this->_nombreBuscado;
                    $query->where('nombre','LIKE','%'.$nombre.'%')
                            ->orWhere('apellido','LIKE','%'.$nombre.'%');
            });
        }
        return $query;
    }

    public function scopeActivo($query)
    {
        return $query->where('baja',0);
    }

}
