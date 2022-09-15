<div>
    <div class="row text-CinzaMedio">
        <h5>Meus pedidos</h5>
        @foreach ($purchases as $purchase)
            <div class="col-6" >
                <div class="mb-3  border p-3 rounded ">
                    <div class="d-flex align-items-center mb-3">
                        <img class="rounded-circle mr-3" src="{{ asset('img/partner/image-store-partner/logo/'.$purchase->store->image_store) }}" alt="" style="width: 50px; height: 50px;object-fit: cover;"><h4 class="text-Dark mb-1 fw-bold">{{$purchase->store->fantasy_name}}</h4>
                    </div>
                    <div class="text-muted d-flex justify-content-between" style="font-size: 15px">
                        <div class="d-flex">
                            <div>
                                Pedido concluido • N°
                            </div>
                            <div class="fw-bold ml-1">
                                {{$purchase->purchase_id}}
                            </div>
                        </div>
                        <div>
                            {{($purchase->created_at)->format('d/m/Y')}} {{($purchase->created_at)->format('H:i')}}
                        </div>
                    </div>

                    <hr>
                    <div class="text-muted">
                    <div class="">
                        •  {{$purchase->Details[0]->products[0]->name}}
                    </div>
                    @if(count($purchase->Details) > 1)
                    <div>
                        • +{{count($purchase->Details) - 1 }} itens...
                    </div>
                    @else
                    <br>
                    @endif
                    </div>
                    {{-- @foreach ($purchase->Details as $detail)

                        @foreach ($detail->products as $product)
                            <div class="text-muted d-flex">
                                <div>
                                    {{$detail->qtd}}
                                </div>
                                <div class="px-1">
                                    {{-- • --}} {{-- -
                                </div>
                                <div>
                                    {{$product->name}}
                                </div>

                            </div>
                        @endforeach
                    @endforeach --}}
                    <hr>
                    <div class="text-center">
                        <a href="" class="text-decoration-none text-AzulPiscina fw-bold">Detalhes</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
