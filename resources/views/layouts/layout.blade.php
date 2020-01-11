<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <div class="pagina d-flex flex-column">
            <header class="header d-flex">
                <div class="nombre-sitio p-2">
                    <h1 class="d-none d-sm-block">AgenciaTaxis</h1>
                    <h1 class="d-sm-none">AT</h1>
                </div>
                <div class="barra p-0 flex-grow-1">
                    <div class="contenedor-menus d-flex justify-content-between align-items-center h-100">
                        <div class="menu-izquierdo pl-3 d-flex align-items-center">
                            <i class="fas fa-arrow-left"></i>
                            <i class="fas fa-arrow-right"></i>
                            <div>
                                <h2 class="mb-0 pl-5 name">{{name()}}</h2>
                            </div>
                        </div>

                        <div class="h-100">
                            <div class="menu-derecho h-100 d-flex justify-content-end align-items-center">
                               {{--  <div class="mensajes caja h-100 d-flex align-items-center p-3">
                                        <a href="#">
                                            <i class="fas fa-comment-alt pr-1"></i>
                                            Mensajes
                                        </a>
                                </div> --}}
                                <div class="mensajes caja h-100 d-flex align-items-center p-3">
                                        <a href="#">
                                            <i class="fas fa-bell pr-1"></i>
                                            Alertas
                                        </a>
                                </div>
                                <div class="cerrar caja h-100 d-flex align-items-center p-3">
                                    <a href="{{ route('logout') }}" class="btn-logout" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Cerrar Sesion
                                    </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="contenedor-principal flex-grow-1 d-flex align-items-strech">
                <div class="sidebar p-4">
                    <div class="usuario d-flex justify-content-around align-items-center">
                        <i class="fas fa-user-circle"></i>
                        <p class="font-weight-bold mb-0">Bienvenid@: <span class="d-block font-weight-normal">Admin</span></p>
                    </div>
                    <div class="menu-admin mt-4 pt-2">
                        <h2 class="text-center p-2">Menú de Administración</h2>
                        <ul class="menu p-0">
                            <li class="py-2 px-3">
                                <a href="#" class="">
                                        <i class="fas fa-walking mx-1"></i>
                                    Clientes
                                </a>
                                <ul class="mt-3 p-3">
                                    <li class="mb-3">
                                    <a href="{{route('clientePrincipal')}}">
                                            <i class="fas fa-list mx-1"></i>
                                            Ver Todos
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="{{route('crearCliente')}}">
                                            <i class="fas fa-plus mx-1"></i>
                                            Agregar Nuevo
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="py-2 px-3">
                                <a href="#" class="">
                                        <i class="fas fa-id-badge mx-1"></i>
                                    Choferes
                                </a>
                                <ul class="mt-3 p-3">
                                    <li class="mb-3">
                                        <a href="{{route('choferPrincipal')}}">
                                            <i class="fas fa-list mx-1"></i>
                                            Ver Todos
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="{{route('crearChofer')}}">
                                            <i class="fas fa-plus mx-1"></i>
                                            Agregar Nuevo
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="py-2 px-3">
                                <a href="" class="">
                                    <i class="fas fa-taxi mx-1"></i>
                                    Carreras
                                </a>
                                <ul class="mt-3 p-3">
                                    <li class="mb-3">
                                        <a href="{{route('carreraPrincipal')}}">
                                            <i class="fas fa-list mx-1"></i>
                                            Ver Todos
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="">
                                            <i class="fas fa-plus mx-1"></i>
                                            Agregar Nuevo
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="py-2 px-3">
                                <a href="#">
                                    <i class="fas fa-pencil-alt mx-1"></i>
                                    Editar Perfil
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
            <div class="contenido">
                @yield('contenido')
            </div>
        </main>
    </div>
</body>
</html>

