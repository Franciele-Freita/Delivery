<div>
    <div wire:ignore class="responsive" >
        @foreach ($categories as $category)

             <a wire:ignore class="bg-white p-2 my-3 mx-3 rounded shadow  text-decoration-none text-CinzaMedio" wire:click="teste('{{$category->id}}')" style="">
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
