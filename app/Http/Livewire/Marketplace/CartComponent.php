<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CartComponent extends Component
{
    public $details;

    public function render()
    {
        $carts = Cart::with('store')->where('user_id', Auth::user()->id)->where('status', 0)->get();
        $cart_id = Cart::where('status', 0)->where('user_id', Auth::user()->id)->max('cart_id');
        return view('livewire.marketplace.cart-component', ['carts' => $carts, /* 'stores' => $stores,  'hasCart' => $hasCart*/]);
    }
    public function subQtd($detail_id)
    {
        $user = Auth::user();
        $detail = CartDetails::find($detail_id);

        $details = CartDetails::where('cart_id', $detail->cart_id)->get();

        $cart = Cart::where('cart_id', $detail->cart_id)->get();

        if(count($details) <= 1 && $detail->qtd <= 1){
            //dd("carrinho");
            Cart::where('cart_id', $detail->cart_id)->delete();
            $detail->delete();


        }elseif($detail->qtd == 1){
            //dd("detalhe");
            $detail->delete();


        }else{
             //dd(--$detail->qtd);
            --$detail->qtd;
            $detail->total = $detail->qtd * $detail->price;
            $detail->save();
        }


    }

    public function addQtd($detail_id)
    {
        $detail = CartDetails::find($detail_id);

        ++$detail->qtd;
        $detail->total = $detail->qtd * $detail->price;
        $detail->save();
    }

    public function returnBack()
    {
        return redirect()->back();
    }
    public function removeProduct($detail_id)
    {
        $detail = CartDetails::find($detail_id);
        $details = CartDetails::where('cart_id', $detail->cart_id)->get();

        if(count($details) <= 1 && $detail->qtd <= 1){
            //dd("carrinho");
            Cart::where('cart_id', $detail->cart_id)->delete();
            $detail->delete();
        }else{
            $detail->delete();
        }


    }
    public function showStore($store_id)
    {
        $id = $store_id;
        return redirect()->route('store.marketplace.show',['id' => $id]);

    }
    public function checkIn($carts_id)
    {
        return redirect()->route('teste', $carts_id);
    }
}
