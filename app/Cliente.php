<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable  = ['nombre','apellido','telefono','email'];

    public function carreras()
    {
        return $this->hasMany(Carrera::class,'cliente_id');
    }

    //scope

    public function scopeBuscadorCliente($query, $nombre)
    {
        if ($nombre != '') {
                return $query->where('nombre','LIKE','%'.$nombre.'%')
                            ->orWhere('apellido','LIKE','%'.$nombre.'%');
            }
    }

}

