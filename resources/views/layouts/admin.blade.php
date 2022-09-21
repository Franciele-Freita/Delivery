<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>AQTEM Delivery - Admin</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @livewireStyles

    <!-- Custom styles for this template -->
  </head>
  <body>
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column pb-3 bg-dark" style="width: 280px;">
            <div class="bg-AzulPiscina pt-3 text-center" style="height: 70px">
                <img style="max-width: 150px" src="{{ asset('img/aplication/logo.svg') }}" alt="">
            </div>

            <ul class="nav nav-pills flex-column mb-auto p-3 mt-2">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ Route::is('admin.index') ? 'active' : '' }} text-white "  data-bs-toggle="link">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                    Dashboard
                    </a>
                </li>

                <li class="nav-item">
                <a href="{{ route('admin.usuarios.index') }}" class="nav-link {{ Route::is('admin.usuarios.index') ? 'active' : '' }} text-white" data-bs-toggle="link">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }} text-white" data-bs-toggle="link">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    Categorias
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.faq.index') }}" class="nav-link {{ Route::is('admin.faq.index') ? 'active' : '' }} text-white" data-bs-toggle="link">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                    FAQ
                    </a>
                </li>
            </ul>

            <div class="dropdown px-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{Auth::guard('admin')->user()->name}}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Conta</a></li>
                <li><a class="dropdown-item" href="#">Configuração</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('admin.destroy') }}">Sair</a></li>
            </ul>
            </div>
        </div>

        <div class="b-example-divider b-example-vr overflow-auto">
            <div class="sticky-top">
                <div class="bg-AzulPiscina "style="height: 70px"></div>
                <div class="">
                    @yield('nav')
                </div>
            </div>
            <main class="container p-3">
                @if(isset($slot))
                {{$slot}}
                @endif
                @yield('conteudo')

            </main>



            <div class="bg-Background p-3">

                @yield('conteudo')
            </div>
        </div>
    </main>
    @livewireScripts
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>


