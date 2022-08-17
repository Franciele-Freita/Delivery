@extends('layouts.app')

@section('conteudo')

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
<section class="container">
    <div class="position-relative mb-3">
        <img class="banner-store border p-1" src="{{ asset("img/partner/image-store-partner/banner/$store->store_banner") }}" alt="">
        {{-- <img class="banner-store" src="{{ asset("img/partner/image-store-partner/banner/$store->store_banner") }}" alt=""> --}}
            <div class="position-absolute bottom-0 rounded-circle  start-50 translate-middle-x mb-2">
                <img class="logo-store border border-4  mt-3 shadow-bold" src="{{ asset("img/partner/image-store-partner/logo/$store->image_store") }}" alt="">
                {{-- <img class="logo-store" src="{{ asset("img/partner/image-store-partner/logo/$store->image_store") }}" alt=""> --}}
            </div>


    </div>

    <div class="mb-5">
        <div class="my-3 d-flex align-items-center">
            <h3 class="mr-3">{{$store->fantasy_name}}</h3>

            @if($store->notes->count() != 0)
            <div class="fst-italic fw-bold text-AmareloGema ">
                <img class="rating-star-icon" src="{{ asset('img/admin/icon/icon-rating-star-yellow.svg') }}" alt="" >
                {{number_format($store->notes()->sum('note') / $store->notes->count(), 1, '.',',')}}
            </div>
            @endif
            {{-- <h3>{{$store->fantasy_name}}</h3> --}}
        </div>
        <div>

        </div>
        <div class="d-flex justify-content-start align-items-center">

        </div>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><img class="icon" src="{{ asset('img/partner/icon/icon-map.svg')}}" alt=""></a>


            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
            <div>
                <img class="icon" src="{{ asset('img/partner/icon/icon-min-note.svg')}}" alt="">
            </div>
            <div>
                <img class="icon" src="{{ asset('img/partner/icon/icon-entrega.svg')}}" alt="">
            </div>
            <div>
                <img class="icon" src="{{ asset('img/partner/icon/icon-like.svg')}}" alt="">
            </div>
            <div>
                <img class="icon" src="{{ asset('img/partner/icon/icon-info.svg')}}" alt="">
            </div>
            <div>
                <img class="icon" src="{{ asset('img/partner/icon/icon-indicar.svg')}}" alt="">
            </div>
            <div>
                @if($store->status == 0)
                    <img title="Fechado" class="icon" src="{{ asset('img/partner/icon/close-door.svg')}}" alt="">
                @else
                    <img title="Aberto" class="icon" src="{{ asset('img/partner/icon/open-door.svg')}}" alt="">
                @endif
            </div>

        </div>

    </div>
    <div class="mb-5">
        {{-- <div class="">
                <h4>Produtos</h4>
            <div class="my-3">
                <div class="promotions">

                     @foreach ($store->categories as $category)
                    @foreach ($category->products as $product )
                    <div class="border rounded-3 shadow-sm d-flex p-2 mr-3" style="widht: 250px">
                        <div class="">
                            <img class="rounded-3" src="{{ asset("img/partner/products/$product->image") }}" alt="" style="width: 150px; height: 120px; object-fit: cover">
                        </div>

                        <div class=" px-2 d-flex flex-column align-self-stretch justify-content-between vw-100">
                            <div>
                                <h3 class="fs-5">{{$product->name}}</h3>
                            </div>
                            <div>
                                {{mb_strimwidth($product->description, 0, 50, "...")}}
                            </div>
                            <div class="d-flex justify-content-end">
                                <h3 class="fw-bold promotion">{{$product->price}}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach


                </div>
            </div>
        </div> --}}

        <div>

            @foreach ($store->categories as $category)
            @if($category->products->count() == 0 )

            @else
             <div class="my-5">
                <h4>{{$category->name}}</h4>
                <div>
                    <div class="row">
                        @foreach ($category->products as $product)
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <a class="text-decoration-none text-Dark" href="#" data-bs-toggle="modal" data-bs-target="#product{{$product->id}}">
                                <div class="border rounded-3 shadow-sm d-flex p-2">
                                    <div class="">
                                        <img class="rounded-3" src="{{ asset("img/partner/products/$product->image") }}" alt="" style="width: 150px; height: 120px; object-fit: cover">
                                    </div>
                                    <div class=" px-2 d-flex flex-column align-self-stretch justify-content-between vw-100">
                                        <div>
                                            <h3 class="fs-5">{{$product->name}}</h3>
                                        </div>
                                        <div>
                                            {{mb_strimwidth($product->description, 0, 50, "...")}}
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <h3 class="fw-bold promotion">{{$product->price}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="product{{$product->id}}" tabindex="-1" aria-labelledby="product{{$product->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('cart.show', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="product{{$product->id}}Label">{{$product->name}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            {{mb_strimwidth($product->description, 0, 50, "...")}}
                                        </div>
                                        <div class="d-flex mb-3">
                                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                            <div class="">
                                                <img class="rounded-3" src="{{ asset("img/partner/products/$product->image") }}" alt="" style="width: 150px; height: 120px; object-fit: cover">
                                            </div>
                                            <div class=" px-2 d-flex flex-column align-self-stretch justify-content-between vw-100">

                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 120px"></textarea>
                                                    <label for="floatingTextarea2">Observações</label>
                                                </div>
                                                {{--<div class="d-flex justify-content-end">
                                                    <h3 class="fw-bold promotion">{{$product->price}}</h3>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        @if($store->status == 0)
                                        <button type="button" class="btn btn-Dark fw-bold text-White"><img class="icon" src="{{ asset('img/partner/icon/close-door-white.svg')}}" alt=""> Loja fechada</button>
                                        @else
                                        <button type="submit" class="btn btn-AzulPiscina fw-bold text-Dark">Adicionar (R$ {{$product->price}})</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
             </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<script>

</script>
@endsection



