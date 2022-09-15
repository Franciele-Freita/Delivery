<div>
    <div>
        <h4 class="text-Dark mb-1 fw-bold py-3">Minha Cesta</h4>
    </div>
    @if(count($carts) >0 )
    <div class="row">
        <div class="col">
            <div class="col rounded bg-white p-3 mb-3 shadow ">
                @foreach ($carts as $cart)
                @foreach ($cart->store as $store)
                <div class="d-flex align-items-center anchor-pointer " wire:click="showStore('{{$store->id}}')">
                    <div>
                        <img class="rounded-circle mr-3" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                    </div>
                    <div>
                        <h4  class="text-Dark mb-1 fw-bold">{{$store->fantasy_name}}</h4>
                    </div>
                </div>

                <hr>
                <div class="px-3 fw-bold d-flex align-items-center text-Dark rounded">
                    <div class="col">Item</div>
                    <div class=" d-flex justify-content-center " style="width: 150px">Qtd</div>
                    <div class=" d-flex justify-content-center " style="width: 200px">Preço</div>
                    <div class=" d-flex justify-content-center " style="width: 90px">Excluir</div>
                </div>
                @foreach ($cart->details as $detail)
                                    @foreach ($detail->products as $product)
                                        <div class="border rounded shadow-sm my-1 d-flex bg-white align-items-center text-CinzaMedio">
                                            <div class="col p-1 fw-bold">
                                                <img class="rounded border mr-3" src="{{ asset('storage/'.$product->image) }}" alt="foto do produto" style="height: 120px; width: 140px; object-fit:cover;">
                                                {{$product->name}}
                                            </div>
                                            <div class="d-flex justify-content-center" style="width: 150px">
                                                <div class="p-2 flex-shrink-1 bd-highlight">
                                                    <div class="btn-group inline border rounded fw-bold" role="group" aria-label="Basic example" style="width: 150px">
                                                        <input type="button" wire:click="subQtd('{{$detail->id}}')" class="btn btn-default text-AmareloGema fw-bold" value="-" style="font-size: 20px">
                                                        <div style="width: 60px" class="text-Dark fw-bold d-flex flex-column align-items-center justify-content-center">{{$detail->qtd}}</div>
                                                        <input type="button" wire:click="addQtd('{{$detail->id}}')" class="btn btn-default text-AmareloGema fw-bold" value="+" style="font-size: 20px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fw-bold d-flex justify-content-center" style="width: 200px">
                                                R$ {{number_format(($detail->price * $detail->qtd),2, ',', '.') }}
                                            </div>
                                            <div class="d-flex justify-content-center" style="width: 90px">
                                                <button wire:click="removeProduct('{{$detail->id}}')" type="button" class="btn-close p-2 bg-AmareloGema"></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                @endforeach
                @endforeach
            </div>
        </div>

        <div  style="width: 400px">
            <div class="bg-white rounded shadow p-3 text-CinzaMedio">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <h4 class="text-Dark fw-bold">Resumo</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        {{$carts->first()->details->sum('qtd')}} @if($carts->first()->details->sum('qtd') > 1)
                        itens
                        @else
                        item
                        @endif
                    </div>
                    <div class="">
                        R$ {{number_format($carts->first()->details->sum('total'), 2 , ',', '.')}}
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold mb-3">
                    <div>
                        <h4>Total</h4>
                    </div>
                    <div class="">
                        <h4>R$ {{number_format($carts->first()->details->sum('total'), 2 , ',', '.')}}</h4>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <button wire:click="checkIn('{{$carts->first()->id}}')" class="btn btn-AzulPiscina form-control mb-3 fw-bold text-CinzaMedio">Continuar</button>
                    <a class="text-center text-CinzaMedio" href="{{ route('marketplace.index') }}">Adicionar mais produtos</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col rounded bg-white p-3 mb-3 shadow d-flex flex-column align-items-center text-CinzaMedio">

        <img src="{{ asset('img/icon/icon-marketplace/icon-basket-cart.svg') }}" alt="" style="width: 100px">

    <h3 class="">Sua cesta está vazia.</h3>
    <div>
        <a class="text-CinzaMedio" href="{{ route('marketplace.index') }}">Voltar as lojas</a>
    </div>

</div>
    @endif




{{--     <hr>

     <div class="row">
        <div class="col">
            @if(count($stores) > 0)

            <div class="col rounded bg-white p-3 mb-3 shadow ">

                @foreach ($stores as $store)
                <div class="d-flex align-items-center anchor-pointer " wire:click="showStore('{{$store->id}}')">
                    <div>
                        <img class="rounded-circle mr-3" src="{{ asset('img/partner/image-store-partner/logo/'.$store->image_store) }}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                    </div>
                    <div>
                        <h4  class="text-Dark mb-1 fw-bold">{{$store->fantasy_name}}</h4>
                    </div>
                </div>
                <hr>
                <div class="px-3 fw-bold d-flex align-items-center text-Dark rounded">
                    <div class="col">Item</div>
                    <div class=" d-flex justify-content-center " style="width: 150px">Qtd</div>
                    <div class=" d-flex justify-content-center " style="width: 200px">Preço</div>
                    <div class=" d-flex justify-content-center " style="width: 90px">Excluir</div>
                </div>
                    @foreach ($store->cart as $cart)
                        @foreach ($cart->details as $detail)
                            @foreach ($detail->products as $product)
                                <div class="border rounded shadow-sm my-1 d-flex bg-white align-items-center text-CinzaMedio">
                                    <div class="col p-1 fw-bold">
                                        <img class="rounded border mr-3" src="{{ asset('storage/'.$product->image) }}" alt="foto do produto" style="height: 120px; width: 140px; object-fit:cover;">
                                        {{$product->name}}
                                    </div>
                                    <div class="d-flex justify-content-center" style="width: 150px">
                                        <div class="p-2 flex-shrink-1 bd-highlight">
                                            <div class="btn-group inline border rounded fw-bold" role="group" aria-label="Basic example" style="width: 150px">
                                                <input type="button" wire:click="subQtd('{{$detail->id}}')" class="btn btn-default text-AmareloGema fw-bold" value="-" style="font-size: 20px">
                                                <div style="width: 60px" class="text-Dark fw-bold d-flex flex-column align-items-center justify-content-center">{{$detail->qtd}}</div>
                                                <input type="button" wire:click="addQtd('{{$detail->id}}')" class="btn btn-default text-AmareloGema fw-bold" value="+" style="font-size: 20px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fw-bold d-flex justify-content-center" style="width: 200px">
                                        R$ {{number_format(($detail->price * $detail->qtd),2, ',', '.') }}
                                    </div>
                                    <div class="d-flex justify-content-center" style="width: 90px">
                                        <button wire:click="removeProduct('{{$detail->id}}')" type="button" class="btn-close p-2 bg-AmareloGema"></button>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </div>
            @else
            <div class="col rounded bg-white p-3 mb-3 shadow d-flex flex-column align-items-center text-CinzaMedio">

                    <img src="{{ asset('img/icon/icon-marketplace/icon-basket-cart.svg') }}" alt="" style="width: 100px">

                <h3 class="">Sua cesta está vazia.</h3>
                <div>
                    <a class="text-CinzaMedio" href="{{ route('marketplace.index') }}">Voltar as lojas</a>
                </div>

            </div>
            @endif
        </div>
        @if(count($stores) > 0 && count($carts) >0 )
            <div  style="width: 400px">
                <div class="bg-white rounded shadow p-3 text-CinzaMedio">
                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <h4 class="text-Dark fw-bold">Resumo</h4>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            {{$carts->first()->details->sum('qtd')}} @if($carts->first()->details->sum('qtd') > 1)
                            itens
                            @else
                            item
                            @endif
                        </div>
                        <div class="">
                            R$ {{number_format($carts->first()->details->sum('total'), 2 , ',', '.')}}
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold mb-3">
                        <div>
                            <h4>Total</h4>
                        </div>
                        <div class="">
                            <h4>R$ {{number_format($carts->first()->details->sum('total'), 2 , ',', '.')}}</h4>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <button wire:click="checkIn('{{$carts->first()->id}}')" class="btn btn-AzulPiscina form-control mb-3 fw-bold text-CinzaMedio">Continuar</button>
                        <a class="text-center text-CinzaMedio" href="{{ route('marketplace.index') }}">Adicionar mais produtos</a>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div> --}}

    <div wire:ignore.self class="modal fade" id="alertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <button type="button" class="btn-close position-absolute top-0 end-0 mt-4 mr-4 p-2 bg-AmareloGema" wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h3 class="">Você só pode adicionar itens de um restaurante ou mercado por vez</h3>
                    <p class="text-AmareloGema fw-bold m-0">Deseja esvaziar a sacola e adicionar este item?</p>
                    <button class="btn btn-AmareloGema">Esvaziar sacola e adicionar</button>
                    <a class="text-decotation-none text-CinzaMedio fw-bold" data-bs-dismiss="modal" aria-label="Close">Cancelar</a>

                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
/*     window.addEventListener('close-modal', event => {
        $( '#alertModal' ).modal( 'hide' );
    }); */

    window.addEventListener('open-modal', event => {
        $( '#alertModal' ).modal( 'show' );
    });
    /* window.addEventListener('close-alert', event => {
        $(document).ready(function(){
        setTimeout(function() {
        $(".alert").fadeOut("slow", function(){
            $(this).alert('close');
        });
        }, 3000);
        });
    }); */
</script>
@endsection
