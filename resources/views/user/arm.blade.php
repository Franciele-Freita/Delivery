<div>

    <section>

        <section class="position-relative mb-3">
            <div >
                <img class="banner-store" src="{{ asset('img/partner/image-store-partner/banner/'.$store->store_banner) }}" alt="banner da loja">
            </div>
            <div class="position-absolute bottom-0 rounded-circle  start-50 translate-middle-x mb-2">
                <img class="logo-store border border-4  mt-3 shadow-bold" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="imagem logo da loja">
            </div>
        </section>
        <section class="d-flex align-items-center">
            <div class="mr-3">
                <h3>{{$store->fantasy_name}}</h3>
            </div>

            <div>
                @if($store->notes->count() != 0)
                    <div class="fst-italic fw-bold text-AmareloGema ">
                        <img class="rating-star-icon" src="{{ asset('img/admin/icon/icon-rating-star-yellow.svg') }}" alt="" >
                        {{number_format($store->notes()->sum('note') / $store->notes->count(), 1, '.',',')}}
                    </div>
                @endif
            </div>

        </section>

        <section class="d-flex justify-content-between align-items-center p-3 rounded mb-3 shadow-sm bg-white">
            <div class="">
                <img class="icon" src="{{ asset('img/partner/icon/icon-min-note.svg')}}" alt="">
            </div>
            <div class="">
                <img class="icon" src="{{ asset('img/partner/icon/icon-entrega.svg')}}" alt="">
            </div>
            <div class="">
                <img class="icon" src="{{ asset('img/partner/icon/icon-like.svg')}}" alt="">
            </div>
            <div class="">
                <img class="icon" src="{{ asset('img/partner/icon/icon-info.svg')}}" alt="">
            </div>
            <div class="">
                <img class="icon" src="{{ asset('img/partner/icon/icon-indicar.svg')}}" alt="">
            </div>
            <div class="">
                @if($store->status == 0)
                    <img title="Fechado" class="icon" src="{{ asset('img/partner/icon/close-door.svg')}}" alt="">
                @else
                    <img title="Aberto" class="icon" src="{{ asset('img/partner/icon/open-door.svg')}}" alt="">
                @endif
            </div>
        </section>
        <section>
            @if($promotions_area == true)
            <div class="rounded shadow p-3" style="background-color: rgba(219, 197, 0, 0.288)">

                <h3><img class="mr-1"  style="width: 20px" src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt=""> Promoções</h3>
                <hr>
                <div class="row">
                    @foreach ($products as $product)
                        @if($product->discount > 0 )
                            <div class="col-4" >
                                <div class="border rounded shadow-sm my-1 d-flex bg-white anchor-pointer" {{-- wire:click="showProduct('{{$product->id}}')" --}} {{-- data-bs-toggle="modal" data-bs-target="#staticBackdrop" --}}>
                                    <div class="p-1">
                                        <img class="rounded border" src="{{ asset('storage/'.$product->image) }}" alt="foto do produto" style="height: 120px; width: 140px; object-fit:cover;">
                                    </div>
                                    <div class="px-3 py-1 d-flex flex-column align-self-stretch justify-content-between vw-100">
                                        <div class=" fw-bold">
                                            {{$product->name}}
                                        </div>
                                        <div>
                                            {{mb_strimwidth($product->description, 0, 50, "...")}}
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            @if($product->discount <= 0)
                                            <div class="fw-bold promotion d-flex align-items-center">
                                                <div ><small>R$ </small>{{number_format($product->price, 2 , ",", ".")}}</div>
                                            </div>
                                            @else
                                            <div class="fw-bold promotion d-flex align-items-center">
                                                <img class="mr-1"  style="width: 20px" src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt="">
                                                <div class="mr-1"><small>R$ </small>{{number_format($product->discount, 2 , ",", ".")}} <del class="text-CinzaClaro" style="font-size: 12px"><small>R$ </small> {{number_format($product->price, 2 , ",", ".")}}</del></div>

                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
            @foreach ($categories as $category)
                <div class="bg-white  rounded shadow p-3 my-3">
                    <h3>{{$category->name}}</h3>
                   {{--  <strong> {{$category->name}}</strong> --}}
                    <hr>
                    <div class="row">
                        @foreach ( $category->products as $product)
                            <div class="col-4">
                                    <div class="border rounded shadow-sm my-1 d-flex bg-white anchor-pointer" wire:click="showProduct('{{$product->id}}')" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                                        <div class="p-1">
                                            <img class="rounded border" src="{{ asset('storage/'.$product->image) }}" alt="foto do produto" style="height: 120px; width: 140px; object-fit:cover;">
                                        </div>
                                        <div class="px-3 py-1 d-flex flex-column align-self-stretch justify-content-between vw-100">
                                            <div class=" fw-bold">
                                                {{$product->name}}
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                @if($product->discount <= 0)
                                                <div class="fw-bold promotion d-flex align-items-center">
                                                    <div ><small>R$ </small>{{number_format($product->price, 2 , ",", ".")}}</div>
                                                </div>
                                                @else
                                                <div class="fw-bold promotion d-flex align-items-center">
                                                    <img class="mr-1"  style="width: 20px" src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt="">
                                                    <div class="mr-1"><small>R$ </small>{{number_format($product->discount, 2 , ",", ".")}} <del class="text-CinzaClaro" style="font-size: 12px"><small>R$ </small>{{number_format($product->price, 2 , ",", ".")}}</del></div>

                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>


                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach



        </section>

    </section>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="showProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
        {{--             <div class="modal-header">
                <h5 class="modal-title" id="showProductModalLabel">{{$product_name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body">
                <img class="rounded border mb-3 position-relative" src="{{ asset('storage/'.$product_image) }}" alt="" style="width: 100%">
                <button type="button" class="btn-close position-absolute top-0 end-0 mt-4 mr-4 p-2 bg-AmareloGema" wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>
                <p class="text-AmareloGema fw-bold m-0">{{$product_category}}</p>
                <h3 class="">{{$product_name}}</h3>
                @if($product_discount > 0)
                    <p class="fw-bold"><img class=""  style="width: 20px" src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt=""> R$ {{number_format($product_discount, 2 , ",", ".")}} <del class="text-CinzaClaro" style="font-size: 15px;">R$ {{number_format($product_price, 2 , ",", ".")}}</del></p>
                @else
                    <p class="fw-bold">R$ {{number_format($product_price, 2 , ",", ".")}}</p>
                @endif
                <p class="border p-3">{{$product_description}}</p>

            </div>

            <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <div class="d-flex bd-highlight">

                        <div class="p-2 flex-shrink-1 bd-highlight">
                            <div class="btn-group inline border rounded" role="group" aria-label="Basic example" style="width: 150px">
                                <input type="button" wire:click="subQtd" class="btn btn-default text-AmareloGema fw-bold" value="-" style="font-size: 20px">
                                <div style="width: 60px" class="text-Dark fw-bold d-flex flex-column align-items-center justify-content-center">{{$product_qtd}}</div>
                                <input type="button" wire:click="addQtd" class="btn btn-default text-AmareloGema fw-bold" value="+" style="font-size: 20px">
                            </div>
                        </div>
                        <div class="p-2 w-100 bd-highlight">
                            <button type="button" class="btn btn-AmareloGema text-CinzaMedio fw-bold form-control px-5">
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
</div>

