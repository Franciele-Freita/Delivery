<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}"/>
    <title>AQTEM Delivery</title>
</head>
<body class="bg-Background d-flex flex-column min-vh-100">

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
                                <a class="dropdown-toggle text-decoration-none text-CinzaMedio fw-bold h-link mr-3" href="#" role="button" id="dropdownMenuLinkRegister" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{-- Olá, {{ Auth::user()->name }} --}}
                                    {{Explode(" ", Auth::user()->name )[0]}}

                                </a>
                                <a title="Carrinho" href="{{ route('cart.index') }}"><img class="mb-1 position-relative" style="width: 25px" src="{{ asset('img/icon/icon-marketplace/icon-basket.svg') }}" alt="">
                                    @if(Auth::user()->cart->sum('qtd') == 0)
                                    @else
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-AmareloGema" style="font-size: 12px">
                                        {{Auth::user()->cart->sum('qtd')}}
                                        <span class="visually-hidden"></span>
                                      </span>

                                    @endif
                                </a>
                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLinkRegister">

                                    <li><input class="dropdown-item fw-bold" type="submit" value="Sair">{{-- <a class="dropdown-item" type="submit" href="">Sair</a> --}}</li>
                                    <li><a class="dropdown-item fw-bold" href="{{ route('purchase.index') }}">Pedidos</a></li>
                                    <li><a class="dropdown-item fw-bold" href="{{ route('profile.index') }}">Perfil</a></li>
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

    <main>
        @yield('content')
    </main>
    <main class="container p-3">

        @yield('conteudo')
    </main>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
          </symbol>
          <symbol id="instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
        </symbol>
    </svg>

    <footer class="bg-BegeMate shadow-sm border-top pt-lg-4 mt-auto">
        <div class="container">
            <div class="row px-5 px-md-0">
                <div class="col-12 col-sm-6 col-lg-3 mt-3 mt-lg-0">
                    <h5>AQTEM Delivery</h5>
                  <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('index') }}" class="nav-link p-0 text-muted">Início</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('marketplace.index') }}" class="nav-link p-0 text-muted">Loja</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Como pedir</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sobre nós</a></li>

                  </ul>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-3 mt-lg-0 text-end text-md-start">
                  <h5>Ajuda</h5>
                  <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Fale conosco</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Dúvidas frequentes</a></li>
                  </ul>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-3 mt-lg-0">
                  <h5>Legal</h5>
                  <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Politica de privacidade</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Termos de uso</a></li>
                  </ul>
                </div>


                <div class="col-12 col-sm-6 col-lg-3 my-3 my-lg-0 text-end text-md-start m-">
                    <h5>Parceiro</h5>
                    <ul class="nav flex-column">
                      <li class="nav-item mb-2"><a href="{{ route('partner.register.index') }}" class="nav-link p-0 text-muted">Registre-se</a></li>
                      <li class="nav-item mb-2"><a href="{{ route('partner.login.index') }}" class="nav-link p-0 text-muted">Entre</a></li>
                      <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Vantagens</a></li>
                    </ul>
                  </div>

            </div>

              <div class="d-flex flex-column justify-content-center align-items-center text-center flex-md-row justify-content-md-between text-md-start py-3  border-top">
                <p>	&reg; 2022 AQTEM Delivery, Todos os diretitos reservados.</p>
                <ul class="list-unstyled d-flex">
                  <li class="ms-3"><a class="link-CinzaMedio" href="https://www.instagram.com/aqtemdelivery/"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                  <li class="ms-3"><a class="link-CinzaMedio" href="https://www.facebook.com/aqtemdelivery"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul>
              </div>

        </div>
    </footer>








    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $('.responsive').slick({
                dots: true,
                centerMode: false,
                infinite: true,
                speed: 300,
                slidesToShow: 9,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 8,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false
                    }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]

            });
        });

        $(document).ready(function(){
            $('.categories').slick({
                dots: true,
                centerMode: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1050,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
        $(document).ready(function(){
            $('.promotions').slick({
                dots: true,
                centerMode: false,
                infinite: false,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1050,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });
    </script>
</body>
</html>
