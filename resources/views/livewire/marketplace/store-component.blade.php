<div>
    @if(session()->has('message'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>

        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{session('message')}}
            </div>
        </div>
    @endif
    <section class="position-relative mb-3">

{{--         <video width="640" height="360" autoplay controls controlslist="nodownload" webkitallowfullscreen mozallowfullscreen></video>
        <video class="rounded" width="100%" height="600px" style="object-fit: cover" controls="controls "  class="video-stream" x-webkit-airplay="allow" data-youtube-id="N9oxmRT2YWw" data-yt2html5="https://www.youtube.com/watch?v=DhGoIb5oS-M"></video>

 --}}{{--         <div >
            <img class="banner-store shadow" src="{{ asset('img/partner/image-store-partner/banner/'.$store->store_banner) }}" alt="banner da loja">
        </div>
 --}}
        {{-- <div class="position-absolute bottom-0 rounded-circle  start-50 translate-middle-x mb-2">
            <img class="logo-store border border-4  mt-3 shadow-bold" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="imagem logo da loja">
        </div> --}}
<img class="banner-store shadow mb-3" src="{{$store->store_banner}}" alt="">


        <section class="d-flex mb-3 ">
            <div class="col d-flex justify-content-between align-items-center p-3 bg-white rounded shadow col-xs-12" >
                <div class="d-flex align-items-center">
                    <img class="rounded border mr-3" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="imagem logo da loja" style="width: 150px">
                    <div class="d-flex flex-column align-items-center bg-white rounded ">
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
                            @endif
                    </div>
                </div>
                <div class="anchor-pointer">
                    @if(session()->has('delivery'))
                        @if (session()->get('delivery') == 0 )
                        <img src="{{ asset('img/icon/icon-marketplace/icon-hire.svg') }}" alt="" style="width: 30px">
                        <a class="text-AzulPiscina" data-bs-toggle="modal" data-bs-target="#deliveryModal">Vou comer na loja!</a>
                        @else
                        <img src="{{ asset('img/icon/icon-marketplace/icon-delivery.svg') }}" alt="" style="width: 30px">
                            <a class="text-AzulPiscina" data-bs-toggle="modal" data-bs-target="#deliveryModal">
                                Entrega pra mim!
                            </a>
                        @endif
                    @endif
                </div>

            </div>

        </section>
{{--     <section class="d-flex align-items-center">
        <div class="mr-3">
            <div>
                <img class="mr-3 logo-store border border-4  mt-3 shadow" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="imagem logo da loja">

                <div class="d-flex align-items-center mb-2">
                    <h3 class="mr-3">{{$store->fantasy_name}}</h3>
                    <div>
                        @if($store->notes->count() != 0)
                            <div class="fst-italic fw-bold text-AmareloGema ">
                                <img class="rating-star-icon" src="{{ asset('img/admin/icon/icon-rating-star-yellow.svg') }}" alt="" >
                                {{number_format($store->notes()->sum('note') / $store->notes->count(), 1, '.',',')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </section>
 --}}

    <section class="d-flex justify-content-between align-items-center p-3 rounded mb-3 shadow bg-white">
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
        <article>
            @if($promotions_area == true)
            <div wire:ignore class="{{-- rounded shadow --}} {{-- px-3 --}} py-3" {{-- style="background-color: rgba(219, 197, 0, 0.288)" --}}>

                <h3><img class="mr-1 mb-3"  style="width: 20px" src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt=""> Promoções</h3>
                {{-- <hr> --}}
                <div  class="row">
                    @foreach ($products as $product)
                        @if($product->discount > 0 )
                        <div class=" col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"  wire:click="showProduct('{{$product->id}}')" data-bs-toggle="modal" data-bs-target="#showProductModal">
                            <div class="p-3 border rounded mb-3 shadow h-product anchor-pointer h-100">
                                <div class="m-sm-4 m-md-0 position-relative ">
                                    <div class=" d-flex justify-content-center">
                                        <img class="rounded mb-3 border img-product" src="{{ asset('storage/'.$product->image) }}" alt="" {{-- style="width: 100%; height: 220px; object-fit: cover" --}}>
                                    </div>
                                    <div class="">
                                        <h5 class="pb-0 mb-0">{{$product->name}}</h5>
                                        @if(strlen($product->description) > 0)
                                        <div class="text-muted">
                                            {{mb_strimwidth($product->description, 0, 70, "...")}}
                                        </div>
                                        @else
                                        <br>
                                        <br>

                                        @endif
                                    </div>
                                    <br>
                                    <div class="d-flex align-items-end justify-content-end  align-items-end ">
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

                                    @auth
                                        @if(isset($product->Favorite))
                                            <img class="mb-1 position-absolute bottom-0 start-0" wire:click="favorite('{{$product->id}}')" src="{{ asset('img/icon/icon-marketplace/icon-favorite-check.svg') }}" alt="" style="width: 25px">
                                        @else
                                            <img class="mb-1 position-absolute bottom-0 start-0" wire:click="favorite('{{$product->id}}')" src="{{ asset('img/icon/icon-marketplace/icon-favorite-outline.svg') }}" alt="" style="width: 25px">

                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

            </div>
            @endif
        </article>

        <article>
            @foreach ($categories as $category)
            <div class="{{-- bg-white  rounded shadow --}} {{-- p-3 --}} my-3">
                <h3>{{$category->name}}</h3>
                {{-- <hr> --}}
                <div class="row">
                    @foreach ( $category->products as $product)
                        <div class=" col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-3"  wire:click="showProduct('{{$product->id}}')" data-bs-toggle="modal" data-bs-target="#showProductModal">
                            <div class="p-3 border rounded mb-3 shadow h-product anchor-pointer h-100">
                                <div class="m-sm-4 m-md-0 position-relative">
                                    <div class=" d-flex justify-content-center ">
                                        <img class="rounded mb-3 border img-product" src="{{ asset('storage/'.$product->image) }}" alt="" {{-- style="width: 100%; height: 220px; object-fit: cover" --}}>
                                    </div>
                                    <div class="">
                                        <h5 class="pb-0 mb-0">{{$product->name}}</h5>
                                        @if(strlen($product->description) > 0)
                                        <div class="text-muted">
                                            {{mb_strimwidth($product->description, 0, 70, "...")}}
                                        </div>
                                        @else
                                        <br>
                                        <br>

                                        @endif
                                    </div>
                                    <br>
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

                                    @auth
                                        @if(isset($product->Favorite))
                                            <img class="mb-1 position-absolute bottom-0 start-0" wire:click="favorite('{{$product->id}}')" src="{{ asset('img/icon/icon-marketplace/icon-favorite-check.svg') }}" alt="" style="width: 25px">
                                        @else
                                            <img class="mb-1 position-absolute bottom-0 start-0" wire:click="favorite('{{$product->id}}')" src="{{ asset('img/icon/icon-marketplace/icon-favorite-outline.svg') }}" alt="" style="width: 25px">

                                        @endif
                                    @endauth

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
             {{--@foreach ($categories as $category)
            <div class="bg-white  rounded shadow p-3 my-3">
                <h3>{{$category->name}}</h3>
                <hr>
                <div class="row">
                    @foreach ( $category->products as $product)
                    <div class="col-md-12 col-lg-6 col-xl-4" >
                        <div class="position-relative">
                            <div class="border rounded shadow-sm my-1 d-flex h-product anchor-pointer" wire:click="showProduct('{{$product->id}}')" data-bs-toggle="modal" data-bs-target="#showProductModal">
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
                            @if(isset($product->Favorite))
                                <img class="p-2 position-absolute top-0 end-0" wire:click="favorite('{{$product->id}}')" src="{{ asset('img/icon/icon-marketplace/icon-favorite-check.svg') }}" alt="" style="width: 40px">
                            @else
                                <img class="p-2 position-absolute top-0 end-0" wire:click="favorite('{{$product->id}}')" src="{{ asset('img/icon/icon-marketplace/icon-favorite-outline.svg') }}" alt="" style="width: 40px">

                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach--}}
         </article>

    </section>
    {{-- modal --}}
    <div wire:ignore.self class="modal fade" id="showProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="rounded border mb-3 position-relative" src="{{ asset('storage/'.$product_image) }}" alt="" style="width: 100%">
                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-4 mr-4 p-2 bg-AmareloGema" wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>

                    <h3 class="">{{$product_name}}</h3>
                     {{--<div class="d-flex">
                        <p class="text-CinzaMedio fw-bold mr-1">{{$product->Store->fantasy_name}}</p><p class="text-CinzaMedio">  •  </p><p class="ml-1 text-AmareloGema fw-bold">{{$product_category}}</p>
                    </div> --}}
                    @if($product_discount > 0)
                        <p class="fw-bold"><img class=""  style="width: 20px" src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt=""> R$ {{number_format($product_discount, 2 , ",", ".")}} <del class="text-CinzaClaro" style="font-size: 15px;">R$ {{number_format($product_price, 2 , ",", ".")}}</del></p>
                    @else
                        <p class="fw-bold">R$ {{number_format($product_price, 2 , ",", ".")}}</p>
                    @endif
                    @if($product->description)
                    <p class="border p-3">{{$product_description}}</p>
                    @endif


                </div>

                @auth
                <div class="modal-footer">
                    <div class="d-flex bd-highlight">

                            <div class="p-2 flex-shrink-1 bd-highlight">
                                <div class="btn-group inline border rounded" role="group" aria-label="Basic example" style="width: 150px">
                                    <input type="button" wire:click="subQtd" class="btn btn-default text-AmareloGema fw-bold" value="-" style="font-size: 20px">
                                    <div style="width: 60px" class="text-Dark fw-bold d-flex flex-column align-items-center justify-content-center">{{$product_qtd}}</div>
                                    <input type="button" wire:click="addQtd" class="btn btn-default text-AmareloGema fw-bold" value="+" style="font-size: 20px">
                                </div>
                            </div>
                            <div class="p-2 w-100 bd-highlight">
                                <button type="button" class="btn btn-AmareloGema text-CinzaMedio fw-bold form-control px-5" wire:click="addCart('{{$product_id}}')">
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
                    @else
                    <div class="modal-footer{{--  bg-AzulPiscina --}}">
                        Faça seu <a href="{{ route('login') }}" class="fw-bold text-CinzaMedio">login</a> ou <a href="{{ route('register') }}" class="fw-bold text-CinzaMedio">registre-se</a> para obter uma melhor experiência!

                    </div>
                    @endauth

            </div>
        </div>
    </div>

    {{-- modal --}}

    <div wire:ignore.self class="modal fade" id="alertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="button" class="btn-close p-2 bg-AmareloGema " wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="px-3 pb-3">
                        <h3 class="text-center mb-3">Você só pode adicionar itens de um restaurante por vez!</h3>
                        <p class="text-CinzaMedio text-center">Deseja esvaziar a sacola e adicionar este item?</p>
                        <button wire:click="deleteCart('{{$product_id}}')" class="btn btn-AmareloGema form-control fw-bold text-CinzaMedio">Esvaziar sacola e adicionar</button>

                    </div>




                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deliveryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Confirme qual modalidade você deseja...</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <Button class="form-control btn btn-AmareloGema fw-bold text-CinzaMedio  mb-3" wire:click="delivery('0')">Estou na Loja</Button>
            <Button  class="form-control btn btn-AzulPiscina fw-bold text-CinzaMedio" wire:click="delivery('1')">Somente Delivery</Button>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/thelevicole/youtube-to-html5-loader@4.0.1/dist/YouTubeToHtml5.js"></script>
<script>new YouTubeToHtml5();</script>
<script>


    window.addEventListener('close-modal', event => {
        $( '#deliveryModal' ).modal( 'hide' );
    $( '#showProductModal' ).modal( 'hide' );
    $( '#alertModal' ).modal( 'hide' );

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
