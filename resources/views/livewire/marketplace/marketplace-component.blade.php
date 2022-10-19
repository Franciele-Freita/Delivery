<div>

    <div id="carouselExampleFade" class="carousel slide carousel-fade mb-3 p-0 rounded" data-bs-ride="carousel">
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
    {{-- end Caroussel --}}

    {{-- Categories --}}
{{--    <div class="row">
    <div class=" col-3 mb-3">
        <div class=" p-3 rounded shadow border">
            <img class="border rounded" src="{{ asset('img/icon/icon-marketplace/Sem título-1.png') }}" alt="" style="width: 270px">
           </div>
       </div>
   </div> --}}
    <div>
        <div wire:ignore class="responsive" >
            @foreach ($categories as $category)

                 <a wire:ignore class="h-product bg-white p-2 my-3 mx-3 rounded shadow  text-decoration-none text-CinzaMedio" wire:click="teste('{{$category->id}}')" style="">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class="mb-2">
                            <img class="{{-- view_icon_category --}} rounded" src="{{ asset("img/admin/icon/$category->img_category") }}" alt="" style="width:120px; height:120px; object-fit:cover;">
                        </div>
                        <div class="fst-italic">
                            {{$category->name_category}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div wire:model="category_id"></div>
       {{--  @livewire('marketplace.categories-slickslide-component') --}}
    </div>
    {{-- end Categories --}}



    {{-- Stores --}}
    <article>
        <div class="row">
            @forelse ($stores as $store)
                <div class=" col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="p-3 border rounded mb-3 shadow h-product anchor-pointer" wire:click="selStore('{{$store->id}}')" {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" --}}>
                        <div class="m-sm-4 m-md-0 ">
                            <div class=" d-flex justify-content-center ">
                                <img class="rounded mb-3 border img-product" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="" {{-- style="width: 100%; height: 220px; object-fit: cover" --}}>
                            </div>
                            <div class="">
                                <h5 class="pb-0 mb-0">{{$store->fantasy_name}}</h5>
                                @if($store->notes->count() != 0)
                                    <div class="">
                                        @if(number_format($store->notes()->sum('note')) <= 5 )
                                        <img class="" src="{{ asset('img/icon/icon-marketplace/icon-star-five.svg') }}" alt="" >
                                        @elseif(number_format($store->notes()->sum('note')) <= 4)
                                        <img class="" src="{{ asset('img/icon/icon-marketplace/icon-star-four.svg') }}" alt="" >
                                        @elseif(number_format($store->notes()->sum('note')) <= 3)
                                        <img class="" src="{{ asset('img/icon/icon-marketplace/icon-star-tree.svg') }}" alt="" >
                                        @elseif(number_format($store->notes()->sum('note')) <= 2)
                                        <img class="" src="{{ asset('img/icon/icon-marketplace/icon-star-two.svg') }}" alt="" >
                                        @else
                                        <img class="" src="{{ asset('img/icon/icon-marketplace/icon-star-one.svg') }}" alt="" >
                                        @endif


                                        {{-- <img class="rating-star-icon" src="{{ asset('img/admin/icon/icon-rating-star-yellow.svg') }}" alt="" >
                                        {{number_format($store->notes()->sum('note') / $store->notes->count(), 1, '.',',')}} --}}
                                    </div>
                                @else
                                <br>
                                @endif
                                <div class="text-muted">
                                    {{$store->branch_of_activity}}
                                </div>
                                <div class="d-flex align-items-center text-muted">
                                    <img class="mr-1" src="{{ asset('img/icon/icon-marketplace/icon-order.svg') }}" alt="" style="width: 18px">
                                    Aceitamos encomendas
                                </div>
                                <div class="text-end">
                                    @if ($store->status == true)
                                    <span class="badge bg-AzulPiscina">Aberto</span>
                                    @else
                                    <span class="badge bg-secondary">Fechado</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                Não encontramos nenhum restaurante que atenda a pesquisa
                <a class="anchor-pointer"  wire:click="teste('0')">Voltar as lojas!</a>
            @endforelse
        </div>
    </article>

{{--     <article>
        <div class="row">
            @forelse($stores as $store)
            <div class="col-4" @if($store->status == false) style="opacity: 0.7; " @endif>
                <div class="position-relative">
                    <div wire:click="showStore('{{$store->id}}')" class="border rounded shadow-sm my-1 d-flex h-product anchor-pointer" >
                        <div class="p-1">
                            <img class="rounded border" src="{{ asset("img/partner/image-store-partner/logo/$store->image_store") }}" alt="foto do produto" style="height: 120px; width: 140px; object-fit:cover;">
                        </div>
                        <div class="px-3 py-1 d-flex flex-column align-self-stretch justify-content-between vw-100">
                            <div>
                                <div class="fw-bold">
                                    {{$store->fantasy_name}}
                                </div>
                                <div class="fst-italic text-AzulPiscina fw-bold d-flex">
                                    <div class="mr-1">
                                        {{$store->branch_of_activity}}
                                    </div> @if($store->notes->count() != 0)

                                    @endif
                                </div>
                                @if($store->notes->count() != 0)
                                <div class="fst-italic fw-bold text-AmareloGema">
                                    <img class="rating-star-icon" src="{{ asset('img/admin/icon/icon-rating-star-yellow.svg') }}" alt="" >
                                    {{number_format($store->notes()->sum('note') / $store->notes->count(), 1, '.',',')}}
                                </div>
                                @endif
                            </div>
                            <div class="d-flex justify-content-end">

                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-0 end-0 h-100 border-start">
                        <div>
                            <img class="p-2" wire:click="favorite('{{$store->id}}')" @if(isset($store->Favorite)) src="{{ asset('img/icon/icon-marketplace/icon-favorite-check.svg') }}" @else src="{{ asset('img/icon/icon-marketplace/icon-favorite-outline.svg') }}" @endif alt="" style="width: 40px">
                        </div>
                        <div>
                            <img class="p-2" src="{{ asset('img/icon/icon-marketplace/icon-orders.svg') }}" alt="" style="width: 40px">
                        </div>
                        <div>

                            <img class="p-2" wire:click="favorite('{{$store->id}}')" @if ($store->status == true) src="{{ asset('img/icon/icon-marketplace/icon-open-door.svg') }}" @else src="{{ asset('img/icon/icon-marketplace/icon-close-door.svg') }}" @endif alt="" style="width: 40px">
                        </div>
                    </div>
                </div>
            </div>

            @empty
                Não há resultados.
            @endforelse
        </div>
    </article>
 --}}    {{-- end Stores --}}


    <!-- Button trigger modal -->


  <!-- Modal Select Address-->
  {{-- <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="p-3 d-flex justify-content-between align-items-center text-CinzaMedio">
            <h4>Buscar Endereço</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
          <input type="text" wire:model="searchAdress" wire:keydown.enter="searchAdress" class="form-control" placeholder="Buscar endereço...">
        <div>
            @forelse ( $res as $r )
            @foreach ($r->cities as $city)

            @endforeach
                <div class="h-product rounded anchor-pointer p-3">
                    <img src="{{ asset('img/icon/icon-marketplace/icon-location.svg') }}" alt="" style="width: 25px; margin-right: 1rem"> {{$r->name}} - {{$city->name}}
                </div>
            @empty
                <div class="mt-5 text-center">

                    <strong> Já tem um endereço salvo? </strong><br>
                    <p>Entre na sua conta para selecionar seu endereço.</p>

                    <a href="" class="text-AmareloGema fw-bold mr-1">Entre</a>ou<a  href="" class="text-AmareloGema fw-bold ml-1">cadastre-se</a>

                </div>
            @endforelse
        </div>

        </div>
      </div>
    </div>
  </div>--}}




  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">Confirme qual modalidade você deseja...</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <Button class="form-control btn btn-AmareloGema fw-bold text-CinzaMedio  mb-3" wire:click="showStore('0')">Estou na Loja</Button>
          <Button  class="form-control btn btn-AzulPiscina fw-bold text-CinzaMedio" wire:click="showStore('1')">Somente Delivery</Button>
        </div>
      </div>
    </div>
  </div>
</div>

@section('scripts')
    <script>
$(document).ready(function(){
            $('.responsive').slick({

                dots: true,
                centerMode: false,
                infinite: true,
                speed: 300,
                slidesToShow: 6,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow:5,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow:4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow:3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
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
    </script>
@endsection


