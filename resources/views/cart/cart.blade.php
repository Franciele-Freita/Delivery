@extends('layouts.app')

@section('conteudo')


    <h2 class="text-Dark mb-3">Minha Cesta</h2>
@if(Auth::user()->cart->sum('qtd') == 0)
    <div class="text-center py-5 rounded text-Dark bg-white shadow">
        <img style="width: 150px" src="{{ asset('img/aplication/icon-sad.svg') }}" alt="">
        <h1>Sua cesta está vazia</h1>
        <a class="text-decoration-none text-AzulPiscina fw-bold" href="{{ route('marketplace.index') }}">Voltar para a loja</a>
    </div>
@else

    <div class="d-flex bd-highlight">
        <div class="flex-grow-1 bd-highlight mr-3">
            <table class="w-100 light rounded">
                <thead class="bg-white text-Dark rounded-top ">
                    <tr>
                        <th scope="col">Item</th>
                        <th class="flex-grow-1 bd-highlight" scope="col">Produto</th>
                        <th scope="col">qtd</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($carts as $cart)
                    @foreach ($cart->products as $product)
                    <tr class="w-100">

                            <td><img style="width: 70px; height: 70px; object-fit: cover; border-radius: 7px;" src="{{ asset("img/partner/products/$product->image") }}" alt=""></th>
                            <td class="text-Dark fw-bold ">{{$product->name}}</td>
                            <td class="text-Dark fw-bold">
                                <div class="btn-group inline border rounded" role="group" aria-label="Basic example">
                                    <form action="{{ route('cart.cartItemAdd') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$cart->product_id}}">
                                        <input type="submit" class="btn btn-default" value="+">
                                    </form>
                                    <div style="width: 60px" class="text-Dark fw-bold d-flex flex-column align-items-center justify-content-center">{{$cart->qtd}}</div>
                                    <form action="{{ route('cart.cartItemSubtract') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$cart->product_id}}">
                                        <input type="submit" class="btn btn-default" value="-">
                                    </form>
                                </div>
                            </td>
                            <td class="text-Dark fw-bold">R$ {{number_format($cart->price, 2,',','.')}}</td>

                    </tr>

                    @endforeach
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="bd-highlight text-center" style="width: 280px">
            <div class="p-3 bg-white shadow rounded text-Dark">
                <h3 class="mb-3" >Resumo do pedido</h3>
                <div class="d-flex justify-content-between">
                    <div>
                        Qtd. itens:
                    </div>
                    <div>
                        {{Auth::user()->cart->sum('qtd')}}
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        Taxa:
                    </div>
                    <div>
                        R$ {{Auth::user()->cart->sum('qtd')}},00
                    </div>
                </div>
                <hr>
                <div  class="d-flex justify-content-between fw-bold">
                    <div>Valor total:</div>

                    <div>R$ {{number_format(Auth::user()->cart->sum('price'), 2,',','.')}}</div>

                </div>
                    <button class="btn btn-AzulPiscina fw-bold form-control my-3">Finalizar</button>
                    <hr>
                    <a class="text-AzulPiscina text-decoration-none" href="{{ route('marketplace.index') }}">Continuar comprando</a>
            </div>

        </div>
    </div>

@endif

@endsection


{{-- foreach($carts as $cart)
{
   foreach($cart->products as $product)
    {
        echo $product->name . "<br>";
    }
} --}}
