

<style>
    .banner-store{
        width: 100%;
        height: 275px;
        object-fit: cover;
        border-radius: 7px;

    }
    .logo-store{
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    .icon{
        height: 30px;
    }
    .icon:hover{
        opacity: 0.8;
        cursor: pointer;
    }
    .caroussel{
        opacity: 0.92;

    }
    .caroussel:hover{
        opacity: 1;

    }
    .price{
        font-size: 15px;
    }

    .promotion{
        font-size: 18px
    }
</style>
    {{-- <h2 class="my-3 py-5">Resultado para <strong>"{{mb_strtoupper($search)}}"</strong></h2> --}}
{{--         @if($stores->count() == 0)
        <h3 class="mt-5">Resultado para a pesquisa: <strong>{{mb_strtoupper($pesquisa)}}</strong></h3>
            <div class="d-flex align-items-center justify-content-center  my-3">
                <p>Ops... Não encontramos o que estava procurando!</p>
            </div>
        @else
        <div class="row">
    <h3 class="mt-5">Resultado para a pesquisa: <strong>{{mb_strtoupper($pesquisa)}}...</strong></h3>
        @foreach ($stores as $store)

                    @if($store->status == 1)
                <div class="col-12 col-sm-6 col-lg-4 my-3">
                    <a class="text-decoration-none text-CinzaMedio" href="{{ route('store.marketplace.show', $store->id) }}">
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
                    </a>
                </div>

                @endif


            @endforeach





        </div>
@endif
 --}}

                        {{-- <div class="">
                            <div class="row">
                                        @if($store->status == 1)
                                    <div class="col-12 col-sm-6 col-lg-4 my-3">
                                        <a class="text-decoration-none text-CinzaMedio" href="{{ route('store.marketplace.show', $store->id) }}">
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
                                        </a>
                                    </div>

                                    @endif


                                    @if($store->status == 0)
                                    <div class="col-12 col-sm-6 col-lg-4 my-3"  style="opacity: 0.6" >
                                        <a class="text-decoration-none text-CinzaMedio" href="{{ route('store.marketplace.show', $store->id) }}">
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
                                        </a>
                                    </div>

                                    @endif
                            </div>
                        </div>



        <div class="mb-5 d-flex flex-column align-items-center justify-content-center">
            <img class="mb-3" style="width:150px" src="{{ asset('img/aplication/icon-no-food.svg') }}" alt="">
            <p><strong> Não foi encontrado nenhuma loja que atenda a pesquisa!</strong></p>
        </div>
        @else
    @endif--}}


    {{--  <h2 class="my-3">Lojas</h2>
    <div class="">
        <div class="row">
            @foreach ($partners as $partner)
                @foreach( $partner->stores as $store)

                    @if($store->status == 1)
                <div class="col-12 col-sm-6 col-lg-4 my-3">
                    <a class="text-decoration-none text-CinzaMedio" href="{{ route('store.marketplace.show', $store->id) }}">
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
                    </a>
                </div>

                @endif


            @endforeach
            @endforeach

            @foreach ($partners as $partner)
                @foreach( $partner->stores as $store)
                @if($store->status == 0)
                <div class="col-12 col-sm-6 col-lg-4 my-3"  style="opacity: 0.6" >
                    <a class="text-decoration-none text-CinzaMedio" href="{{ route('store.marketplace.show', $store->id) }}">
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
                    </a>
                </div>

                @endif
            @endforeach
            @endforeach
        </div>
    </div>
        </div> --}}

@endsection



