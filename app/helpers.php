<?php

function name()
{
    if(request()->routeIs('clientePrincipal')){
        return 'Clientes';
    }elseif(request()->routeIs('choferPrincipal')){
        return 'Choferes';
    }elseif (request()->routeIs('carreraPrincipal')) {
        return 'Carreras';
    }
}
