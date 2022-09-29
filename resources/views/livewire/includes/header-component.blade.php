<div>
    <header>
        <div class="container-fluid shadow bg-AzulPiscina">
            <div class="">
                <div class="container d-flex justify-content-between align-items-center py-3">

                    <div class="d-none d-lg-block">
                        <a href="{{ route('marketplace.index') }}"><img class="size-logo-app" src="{{ asset('img/aplication/logo.svg') }}" alt=""></a>
                    </div>
                    <div class="d-block d-lg-none">
                        <a class="navbar-brand" href="/"><img class="size-logo-app-small" src="{{ asset('img/aplication/logo.svg') }}" alt=""></a>
                    </div>
                    <div class="d-flex align-items-center">
                        @auth
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="dropdown d-flex align-items-center">
                                <a class="{{-- dropdown-toggle  --}}text-decoration-none text-CinzaMedio fw-bold h-link mr-3" href="#" role="button" id="dropdownMenuLinkRegister" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{-- Olá, {{ Auth::user()->name }} --}}
                                    {{-- {{Explode(" ", Auth::user()->name )[0]}} --}}
                                    <img src="{{ asset('img/icon/icon-marketplace/icon-profile.svg') }}" alt="" style="width: 25px">

                                </a>
                                <a title="Carrinho" href="{{ route('cart') }}"><img class=" position-relative" style="width: 25px" src="{{ asset('img/icon/icon-marketplace/icon-basket.svg') }}" alt="">
                                    @if(Auth::user()->cart->sum('qtd') == 0)
                                    @else
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-AmareloGema" style="font-size: 12px">
                                        {{Auth::user()->cart->sum('qtd')}}
                                        <span class="visually-hidden"></span>
                                      </span>

                                    @endif
                                </a>
                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLinkRegister">

                                    <li><a class="dropdown-item fw-bold" href="{{ route('profile.index') }}">Perfil</a></li>
                                    <li><input class="dropdown-item fw-bold" type="submit" value="Sair">{{-- <a class="dropdown-item" type="submit" href="">Sair</a> --}}</li>
                                </ul>
                            </div>
                        </form>
                        @else
                        <div class="d-none d-lg-block">
                            <div class="d-flex align-items-center">
                                <div class="dropdown">
                                    <a class="text-decoration-none text-CinzaMedio fw-bold h-link mr-3" href="#" role="button" id="dropdownMenuLinkRegister" data-bs-toggle="dropdown" aria-expanded="false">
                                    Registre-se
                                    </a>
                                    <ul class="dropdown-menu mt-2 bg-BegeMate border-0 shadow" aria-labelledby="dropdownMenuLinkRegister">
                                        <li><a class="dropdown-item fw-bold" href="{{ route('register') }}">Cliente</a></li>
                                        <li><a class="dropdown-item fw-bold" href="{{ route('partner.register.index') }}">Parceiro</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown ">
                                    <a class="btn btn-AmareloGema text-CinzaMedio fw-bold" href="#" role="button" id="dropdownMenuLinkLogin" data-bs-toggle="dropdown" aria-expanded="false">
                                    Entre
                                    </a>
                                    <ul class="dropdown-menu bg-BegeMate border-0 shadow" aria-labelledby="dropdownMenuLinkLogin">
                                        <li><a class="dropdown-item fw-bold" href="{{ route('login') }}">Cliente</a></li>
                                        <li><a class="dropdown-item fw-bold" href="{{ route('partner.login.index') }}">Parceiro</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="d-block d-lg-none">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
                                <div>
                                    <button class="btn btn-AmareloGema" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                      </button>
                                </div>
                            </nav>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        {{-- btn Search --}}



        {{-- end search --}}
        <div class="collapse navbar-collapse bg-BegeMate d-lg-none shadow" id="navbarSupportedContent">
            <div class="d-flex justify-content-center align-items-center py-2">
                <div class="btn-group">
                    <div class="dropdown">
                        <a class="text-decoration-none text-CinzaMedio fw-bold h-link mr-3" href="#" role="button" id="dropdownMenuLinkRegister" data-bs-toggle="dropdown" aria-expanded="false">
                        Registre-se
                        </a>
                        <ul class="dropdown-menu mt-2 bg-BegeMate border-0 shadow" aria-labelledby="dropdownMenuLinkRegister">
                            <li><a class="dropdown-item fw-bold" href="{{ route('register') }}">Cliente</a></li>
                            <li><a class="dropdown-item fw-bold" href="{{ route('partner.register.index') }}">Parceiro</a></li>
                        </ul>
                    </div>
                </div>
                <div class="btn-group">
                    <div class="dropdown">
                        <a class="btn btn-AmareloGema text-CinzaMedio fw-bold" href="#" role="button" id="dropdownMenuLinkLogin" data-bs-toggle="dropdown" aria-expanded="false">
                        Entre
                        </a>
                        <ul class="dropdown-menu bg-BegeMate border-0 shadow" aria-labelledby="dropdownMenuLinkLogin">
                            <li><a class="dropdown-item fw-bold" href="{{ route('login') }}">Cliente</a></li>
                            <li><a class="dropdown-item fw-bold" href="{{ route('partner.login.index') }}">Parceiro</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </header>
</div>
