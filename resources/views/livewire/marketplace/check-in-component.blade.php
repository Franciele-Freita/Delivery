<div>
    <h4 class="text-Dark mb-1 fw-bold py-3">Finalize seu pedido</h4>
    @if(isset($cart))

    <div class="row">
        <div class="col">
            <div class="rounded bg-white p-3 mb-3 shadow">
                <h5 class="text-Dark fw-bold mb-3">Endereço de entrega:</h5>
                <div class="my-3">
                    @if(session()->has('message'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        {{-- <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol> --}}
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>

                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{session('message')}}
                        </div>
                    </div>
                    @endif
                </div>
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


  <!-- Modal -->
  <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
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

</div>
@section('scripts')
<script>
    window.addEventListener('close-modal', event => {
        $( '#selAddressModal' ).modal( 'hide' );
    });

</script>
@endsection
