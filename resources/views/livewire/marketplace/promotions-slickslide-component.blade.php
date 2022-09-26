<div>
    <div class="responsive">
        @foreach ($products as $product)
            @if($product->discount > 0 )
                <div class="py-3">
                    <div class="position-relative mr-3 ">
                        <div class="p-3  border rounded shadow my-1 d-flex h-product anchor-pointer" wire:click="showProduct('{{$product->id}}')" data-bs-toggle="modal" data-bs-target="#showProductModal">
                            <div class="mr-2">
                                <img class="rounded border" src="{{ asset('storage/'.$product->image) }}" alt="foto do produto" style="height: 120px; width: 140px; object-fit:cover;">
                            </div>
                            <div class="d-flex flex-column align-self-stretch justify-content-between vw-100">
                                <div class=" fw-bold">
                                    {{mb_strimwidth($product->name, 0, 35, "...")}}
                                </div>
                                <div>
                                    {{mb_strimwidth($product->description, 0, 40, "...")}}
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
            @endif
        @endforeach

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
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow:3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow:2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 992,
                    settings: {
                        slidesToShow:1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
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

