<div>
    <div class="row text-CinzaMedio">
        <h5>Meus pedidos</h5>
        @forelse ($purchases as $purchase)

        <div class="col-6">
            <div class="mb-3  border p-3 rounded ">
                <div class="d-flex align-items-center mb-3">
                    <img class="rounded-circle mr-3"
                        src="{{ asset('img/partner/image-store-partner/logo/'.$purchase->store->image_store) }}" alt=""
                        style="width: 50px; height: 50px;object-fit: cover;">
                    <h4 class="text-Dark mb-1 fw-bold">{{$purchase->store->fantasy_name}}</h4>
                </div>
                <div class="text-muted d-flex justify-content-between" style="font-size: 15px">
                    <div class="d-flex">
                        <div>
                            Pedido
                            <span class="badge rounded-pill @if($purchase->Status->last()->status_id == 5) bg-danger @elseif($purchase->Status->last()->status_id == 4) bg-success @elseif($purchase->Status->last()->status_id == 1) bg-secondary @else bg-primary @endif">

                                {{$purchase->Status->last()->Reference->status}}
                              </span>
                             • N°

                        </div>
                        <div class="fw-bold ml-1">
                            {{$purchase->purchase_id}}
                        </div>
                    </div>
                    {{--
                        Reclame aqui
                        procom.com
                        Sofri acidente
                        Coloquei meu carro para consetar
                        Mapfre não quer ocnsertar por inteiro
                        Demoreou vistoria
                        So consegue carro reserva se trocar oficina
                        Ja questionei
                        Carro pra trabalho
                        Não resolve


                        --}}


{{--                     <div>
                        {{($purchase->created_at)->format('d/m/Y')}} {{($purchase->created_at)->format('H:i')}}
                    </div> --}}
                </div>
                <hr>
                <div class="text-muted">
                    <div class="">

                        • {{$purchase->Details[0]->products[0]->name}}
                    </div>
                    @if(count($purchase->Details) > 1)
                    <div>
                        • +{{count($purchase->Details) - 1 }} itens...
                    </div>
                    @else
                    <br>
                    @endif
                </div>
                <hr>
                <div class="text-center">
                    <a class="anchor-pointer text-decoration-none text-AzulPiscina fw-bold"
                        wire:click="showPurchaseDetails('{{$purchase->id}}')" data-bs-toggle="modal"
                        data-bs-target="#modalPurchaseDetails">Detalhes</a>
                </div>

            </div>
        </div>

        @empty
        <div class="col p-3 mb-3 d-flex flex-column align-items-center text-CinzaMedio">

            <img class="mb-3" src="{{ asset('img/icon/icon-marketplace/icon-receipt.svg') }}" alt=""
                style="width: 70px">

            <h3 class="">Não há nenhum pedido realizado.</h3>
        </div>
        @endforelse

    </div>

    {{-- Modal Purchase details --}}

    <div wire:ignore.self class="modal fade" id="modalPurchaseDetails" tabindex="-1" aria-labelledby="modalPurchaseDetailsLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between fw-bold">
                        @foreach ($selPurchase as $purchase)
                            <h3>{{$purchase->Store->fantasy_name}}</h3>
                        @endforeach

                        <button type="button" class="btn-close p-2 bg-AmareloGema" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <a class="text-decoration-none fw-bold text-AmareloGema" href="">Ver cardápio</a> <br> <br>
                    Previsão de entrega: <br>
                    <b>Ter • 21:42 - 21:52</b> <br>
                    <hr>
                    @foreach ($selPurchase as $purchase)
                        @foreach ($purchase->Details as $detail)
                            @foreach ($detail->products as $product)
                            <div class="d-flex align-items-center justify-content-between fw-bold">
                                    <div>
                                        {{$detail->qtd}} - {{$product->name}}
                                    </div>
                                    <div>
                                        R$ {{number_format($detail->price, 2 , ',','.')}}
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    <hr>
                    <div class="d-flex align-items-center justify-content-between fw-bold">
                        <div>
                            Subtotal
                        </div>
                        <div>
                            @foreach ($selPurchase as $purchase)
                                {{number_format($purchase->Details->sum('total'), 2 , ',','.')}}
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-between">
                        <div>
                            Cupom
                        </div>
                        <div>
                            - R$ 27,00
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            Taxa de entrega
                        </div>
                        <div>
                            Grátis
                        </div>
                    </div> --}}
                    <div class="d-flex align-items-center justify-content-between fw-bold">
                        <div>
                            Total
                        </div>
                        <div>
                            @foreach ($selPurchase as $purchase)
                                {{number_format($purchase->Details->sum('total'), 2 , ',','.')}}
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    Entrega em <br>
                    R. Três Lagoas, 365 - Nova Carapina II - ES - Serra/ES - CASA <br>
                    <hr>
                    Nº do pedido <br>
                    @foreach ($selPurchase as $purchase)
                        {{$purchase->purchase_id}}<br>
                        <hr>
                        Data do pedido <br>
                        {{($purchase->created_at)->format('d/m/Y')}} • {{($purchase->created_at)->format('H:i')}}
                        {{-- 13/09/2022 • 20:42 --}} <br>
                    @endforeach

                    <hr>
                    Pagamento na entrega • {{$purchase->Payment->name}}
                    <hr>
                    Status do pedido: <br>
                    Concluído <br>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <a class="text-decoration-none fw-bold text-AmareloGema d-flex text-center">Ver cardápio
                            completo</a> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
