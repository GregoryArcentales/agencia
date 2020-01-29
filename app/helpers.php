<?php

function name()
{
    if(request()->routeIs('clientePrincipal')){
        return 'Clientes';
    }elseif(request()->routeIs('choferPrincipal')){
        return 'Choferes';
    }elseif (request()->routeIs('carreraPrincipal')) {
        return 'Carreras';
    }elseif (request()->routeIs('mostrarCliente')) {
        return 'Cliente';
    }elseif(request()->routeIs('mostrarChofer')){
        return 'Chofer';
    }elseif(request()->routeIs('mostrarCarrera')){
        return 'Carrera';
    }
}
