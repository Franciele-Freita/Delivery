<div>

    {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >Endereço</a> --}}
    {{-- Caroussel --}}
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
    @livewire('marketplace.categories-slickslide-component')
    {{-- end Categories --}}



    {{-- Stores --}}

    <article>
        <div class="row">
            @forelse($stores as $store)
                <div class="col-12 col-sm-6 col-lg-4 my-3" wire:click="showStore('{{$store->id}}')">
                    <div class="mr-3 d-flex flex-row align-items-center">
                        <div>
                            @if(isset($store->image_store))
                            <img class="icon-loja-inicio" src="{{ asset("img/partner/image-store-partner/logo/$store->image_store") }}" alt="">
                            @else
                            <img class="icon-loja-inicio" src="{{ asset("img/partner/image-store-partner/banner-loja1.jpg") }}" alt="">
                            @endif

                        </div>
                        <div class="mx-3">

                            <div class="fw-bold">
                                {{$store->fantasy_name}}
                            </div>
                            <div class="fst-italic text-break " style="width: 160px">
                                {{$store->branch_of_activity}}
                            </div>
                            @if($store->notes->count() != 0)
                            <div class="fst-italic fw-bold text-AmareloGema">
                                <img class="rating-star-icon" src="{{ asset('img/admin/icon/icon-rating-star-yellow.svg') }}" alt="" >
                                {{number_format($store->notes()->sum('note') / $store->notes->count(), 1, '.',',')}}
                            </div>
                            @endif

                        </div>
                    </div>

                </div>

            @empty
                Não há resultados.
            @endforelse
        </div>
    </article>

    {{-- end Stores --}}


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
</div>

@section('scripts')
    <script>

    </script>
@endsection


