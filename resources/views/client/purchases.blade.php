@extends('layouts.app')

@section('conteudo')

<div class="container">
    <div>
        <h3 class="mb-3">Meus Pedidos</h3>
    </div>

    <div class="mb-3">
        <h4>Lojas mais compradas</h4>
    </div>
    <div class="row">
        @foreach ($stores as $store)
        <div class="col-3">
            <div class=" border rounded bg-white d-flex justify-content-center mb-3">
                <div class="p-3">
                    <div class="d-flex justify-content-center">
                        <img src="../../img/partner/image-store-partner/logo/{{$store->image_store}}" alt="" style="width: 80px; height: 80px; border-radius: 50%">
                    </div>
                    <div class="d-flex justify-content-center fw-bold mt-3">
                        {{$store->fantasy_name}} -
                        @foreach ($store->purchases as $purchase)
                            {{$purchase->created_at}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div  class="mb-3">
        <h4>Resumo das ultimas compras</h4>
    </div>
    <div>
{{--         @foreach (Auth::user()->purchases as $purchase)
            <div class="bg-white rounded border p-3 mb-3  text-Dark col-6">
                <div class="d-flex">
                    <div class="mr-3">
                        <img src="../../img/partner/image-store-partner/logo/{{$purchase->store->image_store}}" alt="" style="width: 50px; height: 50px; border-radius: 50%">
                    </div>
                    <div>
                        <div class="fw-bold">
                            {{$purchase->store->fantasy_name}}
                        </div>
                        <div>
                            Pedido {{$purchase->status}} - N° {{$purchase->cod}}
                        </div>
                    </div>
                </div>
                <div>
                    {{$purchase->where('cod', $purchase->cod)->count('cod')}}
                </div>
            </div>
        @endforeach --}}
    </div>

</div>

@endsection

