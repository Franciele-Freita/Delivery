<div>
    <div class="row">
        @if(count($favorite_stores) > 0 || count($favorite_products) > 0)
            @if(count($favorite_products) > 0)
                <h5>Meu Produtos Favoritos</h5>
                <div class="mb-3">
                    <div class="row">
                        @foreach($favorite_products as $favorite)
                        <div class="col-6">
                            <div class="border rounded shadow-sm mb-3 h-product anchor-pointer">
                                <div class="">
                                    <div class="d-flex align-items-center justify-content-between border-bottom p-1">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img class="rounded-circle mr-3" src="{{ asset('img/partner/image-store-partner/logo/'.$favorite->product->store->image_store) }}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                                            </div>
                                            <div>
                                                <h5  class="text-Dark mb-1 fw-bold">{{$favorite->product->store->fantasy_name}}</h5>
                                            </div>
                                        </div>
                                        <div>
                                            @if(isset($favorite->product->Favorite))
                                            <img class="p-2" wire:click="favoriteProduct('{{$favorite->product->id}}')"
                                                src="{{ asset('img/icon/icon-marketplace/icon-favorite-check.svg') }}" alt=""
                                                style="width: 40px">
                                            @else
                                            <img class="p-2" wire:click="favoriteProduct('{{$favorite->product->id}}')"
                                                src="{{ asset('img/icon/icon-marketplace/icon-favorite-outline.svg') }}" alt=""
                                                style="width: 40px">

                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex p-1 "
                                        wire:click="showProduct('{{$favorite->product->id}}')" data-bs-toggle="modal"
                                        data-bs-target="#showProductModal">
                                        <div class="">
                                            <img class="rounded border" src="{{ asset('storage/'.$favorite->product->image) }}"
                                                alt="foto do produto" style="height: 120px; width: 140px; object-fit:cover;">
                                        </div>
                                        <div class="px-3 py-1 d-flex flex-column align-self-stretch justify-content-between" style="width: 100%">
                                            <div class=" fw-bold">
                                                {{$favorite->product->name}}
                                            </div>
                                            <div>
                                                {{mb_strimwidth($favorite->product->description, 0, 50, "...")}}
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                @if($favorite->product->discount <= 0) <div
                                                    class="fw-bold promotion d-flex align-items-center">
                                                    <div><small>R$ </small>{{number_format($favorite->product->price, 2 , ",",
                                                        ".")}}</div>
                                            </div>
                                            @else
                                            <div class="fw-bold promotion d-flex align-items-center">
                                                <img class="mr-1" style="width: 20px"
                                                    src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt="">
                                                <div class="mr-1"><small>R$ </small>{{number_format($favorite->product->discount, 2
                                                    , ",", ".")}} <del class="text-CinzaClaro" style="font-size: 12px"><small>R$
                                                        </small> {{number_format($favorite->product->price, 2 , ",", ".")}}</del>
                                                </div>

                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            @if(count($favorite_stores) > 0)
                <h5>Minhas Lojas Favoritos</h5>
                <div class="mb-3">
                    <div class="row">
                        @foreach($favorite_stores as $favorite)
                        <div class="col-6">
                            <div class="border rounded shadow-sm mb-3 h-product anchor-pointer">
                                <div class="position-relative">
                                    <div wire:click="showStore('{{$favorite->store->id}}')"
                                        class="d-flex h-product anchor-pointer" @if($favorite->store->status
                                        == false) style=" background-color:rgb(230, 230, 230);" @endif>
                                        <div class="p-1">
                                            <img class="rounded border" src="{{ asset("img/partner/image-store-partner/logo/".$favorite->store->image_store) }}" alt="foto do
                                            produto" style="height: 120px; width: 140px; object-fit:cover;">
                                        </div>
                                        <div class="px-3 py-1 d-flex flex-column align-self-stretch justify-content-between" style="width: 100%">
                                            <div>
                                                <div class="fw-bold">
                                                    {{$favorite->store->fantasy_name}}
                                                </div>
                                                <div class="fst-italic text-AzulPiscina fw-bold d-flex">
                                                    <div class="mr-1">
                                                        {{$favorite->store->branch_of_activity}}
                                                    </div> @if($favorite->store->notes->count() != 0)

                                                    @endif
                                                </div>
                                                @if($favorite->store->notes->count() != 0)
                                                <div class="fst-italic fw-bold text-AmareloGema">
                                                    <img class="rating-star-icon"
                                                        src="{{ asset('img/admin/icon/icon-rating-star-yellow.svg') }}" alt="">
                                                    {{number_format($favorite->store->notes()->sum('note') /
                                                    $favorite->store->notes->count(), 1, '.',',')}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-absolute top-0 end-0 border-start h-100">
                                        <div>
                                            <img class="p-2" wire:click="favoriteStore('{{$favorite->store->id}}')"
                                                @if(isset($favorite->store->Favorite)) src="{{
                                            asset('img/icon/icon-marketplace/icon-favorite-check.svg') }}" @else src="{{
                                            asset('img/icon/icon-marketplace/icon-favorite-outline.svg') }}" @endif alt="" style="width:
                                            40px">
                                        </div>
                                        <div>
                                            <img class="p-2" src="{{ asset('img/icon/icon-marketplace/icon-orders.svg') }}" alt=""
                                                style="width: 40px">
                                        </div>
                                        <div>

                                            <img class="p-2" @if ($favorite->store->status
                                            == true) src="{{ asset('img/icon/icon-marketplace/icon-open-door.svg') }}" @else src="{{
                                            asset('img/icon/icon-marketplace/icon-close-door.svg') }}" @endif alt="" style="width: 40px">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            <div class="col p-3 d-flex flex-column align-items-center text-CinzaMedio">

                <img class="mb-3" src="{{ asset('img/icon/icon-marketplace/icon-favorite.svg') }}" alt="" style="width: 70px">

                <h3 class="">Você ainda não adicionou nenhum item aos favoritos.</h3>

            </div>
        @endif
    </div>

</div>

<div wire:ignore.self class="modal fade" id="showProductModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="showProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="rounded border p-1 mb-2">
                    <img class=" rounded position-relative" src="{{ asset('storage/'.$product_image) }}" alt=""
                        style="width: 100%">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-4 mr-4 p-2 bg-AmareloGema"
                        wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="d-flex justify-content-center">
                        <p class="text-CinzaMedio fw-bold mr-1 mb-0">{{$store_fantasy_name}}</p>
                        <p class="text-CinzaMedio mb-0"> • </p>
                        <p class="ml-1 text-AmareloGema fw-bold mb-0">{{$product_category}}</p>
                    </div>
                </div>
                <h3 class="">{{$product_name}}</h3>
                @if($product_discount > 0)
                <p class="fw-bold rounded"><img class="" style="width: 20px"
                        src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt=""> R$
                    {{number_format($product_discount, 2 , ",", ".")}} <del class="text-CinzaClaro"
                        style="font-size: 15px;">R$ {{number_format($product_price, 2 , ",", ".")}}</del></p>
                @else
                <p class="fw-bold">R$ {{number_format($product_price, 2 , ",", ".")}}</p>
                @endif
                @if($product_description)
                <p class="border rounded p-3">{{$product_description}}</p>
                @endif
            </div>
            <div class="modal-footer">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <div class="btn-group inline border rounded" role="group" aria-label="Basic example"
                            style="width: 150px">
                            <input type="button" wire:click="subQtd" class="btn btn-default text-AmareloGema fw-bold"
                                value="-" style="font-size: 20px">
                            <div style="width: 60px"
                                class="text-Dark fw-bold d-flex flex-column align-items-center justify-content-center">
                                {{$product_qtd}}</div>
                            <input type="button" wire:click="addQtd" class="btn btn-default text-AmareloGema fw-bold"
                                value="+" style="font-size: 20px">
                        </div>
                    </div>
                    <div class="p-2 w-100 bd-highlight">
                        <button type="button" class="btn btn-AmareloGema text-CinzaMedio fw-bold form-control px-5"
                            wire:click="addCart('{{$product_id}}')">
                            Adicionar por
                            @if($product_discount > 0)
                            R$ {{number_format(($product_discount * $product_qtd), 2 , ",", ".") }}
                            @else
                            R$ {{number_format(($product_price * $product_qtd), 2 , ",", ".")}}
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<div wire:ignore.self class="modal fade" id="alertModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 d-flex justify-content-end">
                    <button type="button" class="btn-close p-2 bg-AmareloGema " wire:click="resetModal"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="px-3 pb-3">
                    <h3 class="text-center mb-3">Você só pode adicionar itens de um restaurante por vez!</h3>
                    <p class="text-CinzaMedio text-center">Deseja esvaziar a sacola e adicionar este item?</p>
                    <button class="btn btn-AmareloGema form-control fw-bold text-CinzaMedio">Esvaziar sacola e
                        adicionar</button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@section('scripts')
<script>
    window.addEventListener('close-modal', event => {
            $( '#showProductModal' ).modal( 'hide' );
        });
        window.addEventListener('open-modal', event => {
            $( '#alertModal' ).modal( 'show' );
        });
        window.addEventListener('close-alert', event => {
            $(document).ready(function(){
            setTimeout(function() {
            $(".alert").fadeOut("slow", function(){
                $(this).alert('close');
            });
            }, 3000);
            });
        });
</script>
@endsection
