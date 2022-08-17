@extends('layouts.app')

@section('conteudo')
{{-- store.marketplace.storeSearch --}}
<form action="{{ route('store.marketplace.storeSearch') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input type="text" id="search" name="search" class="form-control" @if(isset($pesquisa)) value="{{$pesquisa}}" @endif placeholder="Search...">
        <button class="btn btn-AzulPiscina" type="submit"><img style="width: 25px" src="{{ asset('img/aplication/icon-search.svg') }}" alt=""></button>
    </div>
</form>
<div id="carouselExampleFade" class="carousel slide carousel-fade m-0 p-0  rounded" data-bs-ride="carousel">
    <div class="carousel-inner rounded">
        <div class="carousel-item active rounded">
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
<h2 class="my-3">Escolha entre as categorias</h2>

<div>
    <div class="responsive">

        @foreach ($categories as $category)
        <form action="{{ route('store.marketplace.storeSearch') }}" method="POST">
            @csrf
        <button class="btn text-decoration-none text-CinzaMedio" type="submit">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <input type="hidden" name="search" value="{{$category->name_category}}">
                <div>
                    <img class="view_icon_category rounded" src="{{ asset("img/admin/icon/$category->img_category") }}" alt="">
                </div>
                <div class="fst-italic">
                    {{$category->name_category}}
                </div>
            </div>
        </button>
        </form>
        @endforeach
    </div>
</div>
@yield('stores')
@endsection






