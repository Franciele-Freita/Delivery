<div>
    <div class="responsive">
        @foreach ($categories as $category)

             <a class="text-decoration-none text-CinzaMedio" wire:click="teste('{{$category->id}}')">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div>
                        <img class="view_icon_category rounded" src="{{ asset("img/admin/icon/$category->img_category") }}" alt="">
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
                slidesToShow: 8,
                slidesToScroll: 1,
                centerMode: true,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 8,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
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
