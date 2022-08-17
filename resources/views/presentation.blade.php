@extends('layouts.app')

@section('content')

<div id="carouselExampleFade" class="carousel slide carousel-fade bg-AzulPiscina m-0 p-0" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('img/aplication/slid-presentation/Slide-1.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/aplication/slid-presentation/slide-2.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/aplication/slid-presentation/slide-3.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/aplication/slid-presentation/slide-4.png')}}" class="d-block w-100" alt="...">
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>

  <div class="container mx-auto mt-5">
    <h2>Diversas categorias para você se saborear...</h2>

    <div class="row mt-3">
        @foreach ($categories as $category)
        <div class="col shadow rounded bg-white mr-3 my-2 p-3">
            <a class="text-decoration-none text-CinzaMedio" href="">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div>
                        <img class="view_icon_category-home" src="{{ asset("img/admin/icon/$category->img_category") }}" alt="">
                    </div>
                    <div class="fw-bold mt-3">
                        {{$category->name_category}}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        <a class="text-center btn btn-AmareloGema fw-bold text-Dark"href="{{ route('marketplace.index') }}">Conheça nossos parceiros</a>

    </div>
  </div>

  <div class="bg-BegeMate shadow">
    <div class="container mx-auto mt-5">
        <h2 class="text-center py-5">Nosso App</h2>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <img class="img-app-movel" src="{{ asset('img/aplication/app-movel/smartphone-app.png') }}" alt="">
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="text-center">
                    <h3>App AQTEM Delivery</h3>
                    <p>Leve agente no seu bolso,
                        é muito simples!
                        Baixe nosso App no seu celular.
                        Estamos na Google Play Store e na Apple Store.
                    </p>
                    <p class="fst-italic">
                        Baixe aqui...
                    </p>
                </div>
                <div class="d-flex flex-row">
                    <div class="mr-3">
                        <img src="{{ asset('img/aplication/app-movel/icon-apple-app-store.svg') }}" alt="">
                    </div>
                    <div>
                        <img src="{{ asset('img/aplication/app-movel/icon-google-play.svg') }}" alt="">
                    </div>
                </div>

            </div>
        </div>

      </div>

  </div>

  <div class="container mx-auto mt-5">
    <h2 class="text-center py-5">Espaço do Parceiro</h2>

    <div class="d-flex justify-content-center align-items-center mt-3">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="text-center">
                <h3>Seja um parceiro</h3>
                <p>Aqui sua loja vai vender mais.
                    Cadastre sua loja e alcance mais longe!
                    Descubra as vantagens de seu parceiro da AQTEM Delivery.
                </p>
                <p class="fst-italic">
                    Clique no abaixo para saber mais...
                </p>
                <button class="btn btn-AmareloGema form-control my-3 fw-bold text-Dark">Saiba Mais</button>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <img class="img-app-movel" src="{{ asset('img/aplication/app-movel/app-parceiro.png') }}" alt="">
        </div>
    </div>

  </div>

@endsection






