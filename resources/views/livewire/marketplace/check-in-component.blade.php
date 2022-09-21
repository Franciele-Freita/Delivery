<div>
    <h4 class="text-Dark mb-1 fw-bold py-3">Finalize seu pedido</h4>
    @if(isset($cart))

    <div class="row">
        <div class="col">
            <div class="rounded bg-white p-3 mb-3 shadow">
                <h5 class="text-Dark fw-bold mb-3">Endereço de entrega:</h5>
                <address class="p-3 border rounded d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                        <img class="mr-1" src="{{ asset('img/icon/icon-marketplace/icon-location.svg') }}" alt="" style="width: 25px">
                        <div>
                            {{$address->street}}, {{$address->number}}, {{$address->district}} - {{$address->city}}/{{$address->estate}} - cep: {{$address->cep}}
                        </div>
                    </div>
                    <img class="anchor-pointer" src="{{ asset('img/icon/icon-marketplace/icon-edit.svg') }}" alt="" style="width: 25px"  data-bs-toggle="modal" data-bs-target="#selAddressModal">
                </address>
                <div>
                    <h5 class="text-Dark mb-3 fw-bold">Forma de Pagamento:</h5>
                    <div class="row">
                        @foreach ($paymentForms as $payment)
                        <div wire:click="selPaymentForm('{{$payment->id}}')" class="col-3">
                            <div class="d-flex flex-column align-items-center anchor-pointer h-product rounded  @if ($payment->id == session()->get('payment'))
                                payment-active
                            @endif">
                                <img src="{{ asset('storage/'.$payment->image) }}" alt="" style="height: 50px">
                                 <b>{{$payment->name}}</b>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div  style="width: 500px">
            <div class="bg-white rounded shadow p-3 text-CinzaMedio">
                <div class="fst-italic ">Parceiro:</div>
                @foreach ($cart->store as $store)
                <div class="d-flex align-items-center py-3">
                    <img class="rounded-circle mr-3" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="" style="width: 50px; height: 50px; object-fit: cover"><h5 class="text-Dark mb-1 fw-bold"> {{$store->fantasy_name}}</h5>
                </div>
                @endforeach

                <div class="mb-3">
                    @foreach ($cart->details as $detail)
                        @foreach ($detail->products as $product)
                            <div class="fw-bold border p-3 text-CinzaMedio rounded mb-1 d-flex align-items-center justify-content-between ">
                                <div class="mr-3 ">
                                    {{$detail->qtd}} -  {{$product->name}}
                                </div>

                                <div class="text-end" style="width: 150px">
                                    R$ {{number_format($detail->price * $detail->qtd, 2 , ',', '.')}}
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="px-2">
                    <div class="d-flex justify-content-between">
                        <div>
                            Subtotal
                        </div>
                        <div class="">
                            R$ {{number_format($cart->details->sum('total'), 2 , ',', '.')}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between fw-bold">
                        <div>
                            <h4>Total</h4>
                        </div>
                        <div class="mb-3">
                            <h4>R$ {{number_format($cart->details->sum('total'), 2 , ',', '.')}}</h4>
                        </div>
                    </div>
                </div>
                <button wire:click="saveRequest" class="btn btn-AmareloGema form-control text-CinzaMedio fw-bold">Finalizar Pedido</button>

            </div>
        </div>
        @else
        @endif
{{--         <div  style="width: 500px">
            <div class="bg-white rounded shadow p-3 text-CinzaMedio">
                <div class="fst-italic ">Parceiro:</div>
                @foreach ($stores as $store)
                    <div class="d-flex align-items-center py-3">
                        <img class="rounded-circle mr-3" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="" style="width: 50px; height: 50px; object-fit: cover"><h5 class="text-Dark mb-1 fw-bold"> {{$store->fantasy_name}}</h5>
                    </div>

                    <div class="mb-3">
                        @foreach ($cart->details as $detail)
                            @foreach ($detail->products as $product)
                                <div class="fw-bold border p-3 text-CinzaMedio rounded mb-1 d-flex align-items-center justify-content-between ">
                                    <div class="mr-3 ">
                                        {{$detail->qtd}} -  {{$product->name}}
                                    </div>

                                    <div class="text-end" style="width: 150px">
                                        R$ {{number_format($detail->price * $detail->qtd, 2 , ',', '.')}}
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="px-2">
                        <div class="d-flex justify-content-between">
                            <div>
                                Subtotal
                            </div>
                            <div class="">
                                R$ {{number_format($detail->sum('total'), 2 , ',', '.')}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between fw-bold">
                            <div>
                                <h4>Total</h4>
                            </div>
                            <div class="mb-3">
                                <h4>R$ {{number_format($detail->sum('total'), 2 , ',', '.')}}</h4>
                            </div>
                        </div>
                    </div>
                    <button wire:click="saveRequest" class="btn btn-AmareloGema form-control text-CinzaMedio fw-bold">Finalizar Pedido</button>
                @endforeach

            </div>
        </div> --}}
    </div>
    {{-- Modal --}}

    <div wire:ignore.self class="modal fade" id="selAddressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="selAddressModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <h3 class="text-CinzaMedio">Selecione o endereço</h3>
                        <button type="button" class="btn-close p-2 bg-AmareloGema " wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            @foreach ($user->addresses as $address)
                                <address wire:click="selAddress('{{$address->id}}')" class="anchor-pointer h-product p-3 border rounded d-flex align-items-center justify-content-between mb-1">
                                    <div class="d-flex align-items-center">
                                        <img class="mr-1" src="{{ asset('img/icon/icon-marketplace/icon-location.svg') }}" alt="" style="width: 25px">
                                        <div>
                                            {{$address->street}}, {{$address->number}}, {{$address->district}} - {{$address->city}}/{{$address->estate}} - cep: {{$address->cep}}
                                        </div>
                                    </div>
                                </address>
                            @endforeach
                        </div>
                        <button class="btn btn-AmareloGema form-control fw-bold text-CinzaMedio">Informar outro endereço</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@section('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $( '#selAddressModal' ).modal( 'hide' );
    });
</script>
@endsection
