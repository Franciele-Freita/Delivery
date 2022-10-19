<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AQTEM Delivery - Parceiro</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @livewireStyles


</head>
<body>
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
        body {
        min-height: 100vh;
        min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }

        main {
            display: flex;
            flex-wrap: nowrap;
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow-x: auto;
            overflow-y: hidden;
        }

/*         .b-example-divider {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        } */

        .bi {
            vertical-align: -.125em;
            pointer-events: none;
            fill: currentColor;
        }

        .dropdown-toggle { outline: 0; }

        .nav-flush .nav-link {
            border-radius: 0;
        }

        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            color: rgba(0, 0, 0, .65);
            background-color: transparent;
            border: 0;
        }
        .btn-toggle:hover,
        .btn-toggle:focus {
            color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
        }

        .btn-toggle::before {
            width: 1.25em;
            line-height: 0;
            content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
            transition: transform .35s ease;
            transform-origin: .5em 50%;
        }

        .btn-toggle[aria-expanded="true"] {
            color: rgba(0, 0, 0, .85);
        }
        .btn-toggle[aria-expanded="true"]::before {
            transform: rotate(90deg);
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
            margin-top: .125rem;
            margin-left: 1.25rem;
            text-decoration: none;
        }
        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #d2f4ea;
        }

        .scrollarea {
            overflow-y: auto;
        }

        ::-webkit-scrollbar-thumb{
            background-color: #d6e8ff73;
            border-radius: 5px;
        }
        ::-webkit-scrollbar{
            background-color: rgba(0, 0, 0, 0.733);
            width: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;

        }
        .h-max-dropdawn{
            max-height: 200px;
        }

        .img-logo-painel{
            width: 150px;
        }

        .btn-toggle::before {
            width: 1.25em;
            line-height: 0;
            content: url('../../img/partner/icon/icon-arrow-left-collapse.svg') !important;
            transition: transform .35s ease;
            transform-origin: 0.5em 50%;
        }


        .mr-1{
            margin-right: 7px;

        }
        .h-novo:hover, .btn-toggle:hover, .btn-toggle:focus{
            background-color: hsla(0, 0%, 100%, 0.205) !important;
            border-radius: 5px;

        }
        .btn-toggle-nav a:hover, .btn-toggle-nav a:focus {
            background-color: transparent !important;
        }

        .link-dark:focus, .link-dark:hover {
    color: #ffffff!important;
}


        .fw-semibold { font-weight: 600; }
        .lh-tight { line-height: 1.25; }

    </style>
  <main class="d-flex flex-nowrap">
    <div class="d-flex flex-column pb-3 bg-dark"  style="width: 280px;">
        <div class="bg-AmareloGema pt-3 text-center" style="height: 78px">
            <img style="max-width: 150px" src="{{ asset('img/aplication/logo.svg') }}" alt="">
        </div>

        <div class="vh-100 overflow-auto p-2">

            <div>
                <img src="{{ asset('') }}" alt="">
            </div>

                @if(Auth::guard('partner')->user()->stores->first()->status == 0)
                <a href="{{ route('setup.create') }}" class="btn btn-BrancoGelo align-items-center text-Dark fw-bold my-3 rounded collapsed form-control">
                    <img style="width:30px;" src="{{ asset('img/partner/icon/close-door.svg') }}" alt="">Loja Fechada</a>
                @else
                <a href="{{ route('setup.create') }}" class="btn btn-AmareloGema align-items-center text-Dark fw-bold my-3 rounded collapsed form-control">
                    <img style="width:30px;" src="{{ asset('img/partner/icon/open-door.svg') }}" alt="">Loja Aberta</a>


                @endif


            <ul class="list-unstyled ps-0 scrollarea " id="accordionExample">
                <li class="mb-1 ">
                    <a class="btn btn-toggle align-items-center text-white rounded collapsed form-control" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse2" aria-expanded="false">
                      Dashboard
                    </a>
                    <div class="collapse" id="dashboard-collapse2" data-bs-parent="#accordionExample">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pt-1 pb-1 small overflow-auto h-max-dropdawn">
                        <li class="h-novo mr-1"><a href="{{ route('partner.index') }}" class="link-dark text-white rounded py-2">Dashboard</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-1 ">
                    <a class="btn btn-toggle align-items-center text-white rounded collapsed form-control" data-bs-toggle="collapse" data-bs-target="#orders-collapse2" aria-expanded="false">
                      Pedidos
                    </a>
                    <div class="collapse" id="orders-collapse2" data-bs-parent="#accordionExample">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pt-1 pb-1 small overflow-auto h-max-dropdawn">
                        <li class="h-novo mr-1"><a href="{{ route('order.index') }}" class="link-dark text-white rounded py-2">Pedidos</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-1">
                    <a class="btn btn-toggle align-items-center text-white rounded collapsed form-control" data-bs-toggle="collapse" data-bs-target="#patio-collapse" aria-expanded="false">
                      Produtos
                    </a>
                    <div class="collapse" id="patio-collapse" data-bs-parent="#accordionExample">
                      <ul class="btn-toggle-nav list-unstyled fw-normal small pt-1 overflow-auto h-max-dropdawn">
                        <li class="h-novo  mr-1"><a href="{{ route('product.index') }}" class="link-dark text-white rounded py-2">Produtos</a></li>
                      </ul>
                    </div>
                  </li>
                <li class="mb-1">
                  <a class="btn btn-toggle align-items-center text-white rounded collapsed form-control" data-bs-toggle="collapse" data-bs-target="#entrada-collapse" aria-expanded="false">
                    Categorias
                  </a>
                  <div class="collapse" id="entrada-collapse" data-bs-parent="#accordionExample">
                    <ul class="btn-toggle-nav list-unstyled fw-normal small pt-1 overflow-auto h-max-dropdawn">
                      <li class="h-novo mr-1"><a href="{{ route('category.index') }}" class="link-dark text-white rounded py-2">Categorias</a></li>
                    </ul>
                  </div>
                </li>
                <li class="mb-1">
                    <a class="btn btn-toggle align-items-center text-white rounded collapsed form-control" data-bs-toggle="collapse" data-bs-target="#admin-collapse" aria-expanded="false">
                      Loja
                    </a>
                    <div class="collapse" id="admin-collapse" data-bs-parent="#accordionExample">
                      <ul class="btn-toggle-nav list-unstyled fw-normal small pt-1 overflow-auto h-max-dropdawn">
                        <li class="h-novo mr-1"><a href="{{ route('setup.index') }}" class="link-dark text-white rounded py-2">Dados da loja</a></li>
                        <li class="h-novo mr-1"><a href="" class="link-dark text-white rounded py-2">Financeiro</a></li>
                      </ul>
                    </div>
                  </li>

          </ul>

        </div>


        <div class="dropdown px-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('img/partner/icon/icon-user-default.svg') }}" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{Auth::guard('partner')->user()->name}}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Ajuda</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="{{ route('partner.destroy') }}" method="POST">
                    @csrf
                    <li><input class="dropdown-item" type="submit" value="Sair"></li>

                </form>
            </ul>
        </div>
    </div>

    <div class="b-example-divider b-example-vr overflow-auto">
        <div class="sticky-top">
            <div class="bg-AmareloGema "style="height: 70px"></div>
            <div class="">
                @yield('nav')
            </div>
        </div>



        <div class="bg-Background p-3">
            @if(isset($slot))
            {{$slot}}
            @endif
            @yield('conteudo')
        </div>
    </div>
</main>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts

    @yield('scripts')

</body>
</html>
