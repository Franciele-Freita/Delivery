<div wire:poll>
{{--     Current time: {{ now() }}

 --}}
 <audio id="notificacao" preload="auto">
        <source src="{{ asset('Clinking_Teaspoon-Simon_Craggs-59102891.mp3') }}" type="audio/mpeg">
    </audio>
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="mr-3">
                    <h3 class="text-Dark">Vendas</h3>
                </div>
            </div>
        </div>
        <div class="my-3">
            @if(session()->has('message'))
                @livewire('msg')
            @endif
        </div>
        {{-- <div class="mt-3 p-3 fw-bold text-CinzaMedio border border-AmareloGema rounded mb-3">
            Aqui estão seus produtos organizados por categoria... altere a visualização atravez dos icones logo acima!
         </div> --}}
         <div class="mb-5  bg-white  shadow  px-3 pt-3 pb-1 rounded" >
            <div class="row  py-1 fw-bold text-Dark rounded">
                <div style="width: 100px">Pedido</div>
                <div class="col">Pagamento</div>
                <div class="col">Status</div>
                <div class="col">Taxa de entrega</div>
                <div class="col">Valor dos itens</div>
                <div class="col">Total do pedido</div>
                <div class=" d-flex justify-content-center " style="width: 90px">Ações</div>
            </div>
            @foreach ($purchases as $purchase)
            <div  class="anchor-pointer h-product row border py-3 my-1 d-flex align-items-center text-Dark rounded">
                <div style="width: 100px" class="d-flex flex-column justify-content-center {{-- align-items-center --}}">
                    <div class="fw-bold">
                        {{$purchase->purchase_id}}
                    </div>
                    <div class="text-muted" style="font-size: 12px">
                        {{($purchase->created_at)->format('H:i')}}
                    </div>
                </div>
                <div class="col"><img class="mr-1" src="{{ asset('storage/'.$purchase->Payment->image) }}" alt="" style="width: 50px">{{$purchase->Payment->name}}</div>
                <div class="col"><span class="badge  @if($purchase->Status->last()->status_id == 5) bg-danger @elseif($purchase->Status->last()->status_id == 4) bg-success @elseif($purchase->Status->last()->status_id == 1) bg-secondary @else bg-primary @endif rounded-pill py-1 px-3">{{$purchase->Status->last()->reference->status}}</span></div>
                <div class="col">R$ 0,00</div>
                <div class="col">R$ {{number_format($purchase->details->sum('total'), 2, ',','.')}}</div>
                <div class="col fw-bold">R$ {{number_format($purchase->details->sum('total'), 2, ',','.')}}</div>
                <div class=" d-flex justify-content-center" style="width: 90px">
                    <div class="btn-group dropstart">
                        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item fw-bold text-Dark" href="#" wire:click="showDetails('{{$purchase->id}}')" data-bs-toggle="modal" data-bs-target="#showDetails">Ver Detalhes </a></li>
                            <li><a class="dropdown-item fw-bold text-Dark" href="#" wire:click="selectPurchase('{{$purchase->id}}')" data-bs-toggle="modal" data-bs-target="#calcelPurchase">Cancelar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
         </div>
    </div>

        {{-- Detail Purchase Modal --}}
        <div wire:ignore.self class="modal fade" id="showDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="modal-title">Detalhes do pedido</h4>
                            <button type="button" class="btn-close bg-AmareloGema text-end" wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <h5 class="">Pedido nº {{ $purchase_id}}</h5>
                        <div class="d-flex align-itens-center justify-content-between">
                            <p>{{-- 12 de setembro - 01:53 --}} {{$created_at_date}} - {{$created_at_hour}}</p>
                            <p>1 pedido realizado</p>
                        </div>

                    </div>

                    {{-- <div class="modal-footer">

                    </div> --}}
                </div>
            </div>
        </div>


    {{-- cancel Purchase Modal --}}
    <div wire:ignore.self class="modal fade" id="calcelPurchase" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="modal-title">Cancelar Pedido</h4>
                        <button type="button" class="btn-close bg-AmareloGema text-end" wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <h5 class="">Pedido nº {{ $purchase_id}}</h5>
                    <div class="d-flex align-itens-center justify-content-between">
                        <p>{{-- 12 de setembro - 01:53 --}} {{$created_at_date}} - {{$created_at_hour}}</p>
                        <p>1 pedido realizado</p>
                    </div>
                    <h5 class="">Por que você quer cancelar o pedido?</h5>

                    <div class="form-check px-5 py-3 rounded border mb-3" >
                        <input class="form-check-input" wire:model="reason" type="radio" name="reason" id="reason1">
                        <label class="form-check-label" for="reason1">
                            O endereço está incompleto e o cliente não atende
                        </label>
                    </div>
                    <div class="form-check px-5 py-3 rounded border mb-3" >
                        <input class="form-check-input" wire:model="reason" type="radio" name="reason" id="reason2">
                        <label class="form-check-label" for="reason2">
                            Suspeita de golpe ou trote
                        </label>
                    </div>
                    <div class="form-check px-5 py-3 rounded border mb-3" >
                        <input class="form-check-input" wire:model="reason" type="radio" name="reason" id="reason3">
                        <label class="form-check-label" for="reason3">
                            O pedido foi feito fora do horário de funcionamento da loja
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comentário</label>
                      </div>
                      <div class="d-flex justify-content-end">
                        <button class="btn btn-AmareloGema fw-bold text-CinzaMedio">Cancelar Pedido</button>
                      </div>
                </div>

                {{-- <div class="modal-footer">

                </div> --}}
            </div>
        </div>
    </div>
</div>




@section('scripts')
<script>

    window.addEventListener('play-bip', event => {
        $('#notificacao').trigger('play');
        document.getElementById('notificacao').play();
    });
</script>
@endsection
