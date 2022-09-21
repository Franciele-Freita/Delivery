<div>
    <h5 class="mb-3">Perguntas Frequentes - FAQ</h5>
    <div class="accordion" id="accordionExample">
        @foreach ($faqs as $faq)
        <div class="mb-3 px-3">
            <p class="">
                <a class="d-flex justify-content-between text-decoration-none fw-bold text-CinzaMedio " data-bs-toggle="collapse" href="#collapseFaq{{$faq->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                    • {{$faq->title}}
                    <img class="arrow" src="{{ asset('img/icon/icon-marketplace/icon-arrow-left-collapse.svg') }}" alt="" style="stroke:#495057;">
                </a>

            </p>
            <div class="collapse px-3" id="collapseFaq{{$faq->id}}"  data-bs-parent="#accordionExample">
                <div class="text-CinzaMedio">
                    {{$faq->content}}
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>
