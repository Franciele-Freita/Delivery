<div>
    <hr>
   Olá, auqi é um teste de troca de variavel entre componentes livewire; <br>
    e esta é a variavel que estou tentando passar: {{$teste}}
   <hr>

    {{--     <div class="modal fade" id="product{{$product->id}}" tabindex="-1" aria-labelledby="product{{$product->id}}Label" aria-hidden="true">
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
                                <div class="d-flex justify-content-end">
                                    <h3 class="fw-bold promotion">{{$product->price}}</h3>
                                </div>
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
        </div> --}}
</div>
