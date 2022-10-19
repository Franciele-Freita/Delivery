<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\CategoryPartner;
use App\Models\FavoriteProduct;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class StoreComponent extends Component
{
    public $store_id, $promotions_area, $product_id, $product_image, $product_category, $product_name, $product_discount, $product_price, $product_description, $product_qtd = 1, $cart = [], $teste;
    public function mount($id)
    {
        $this->store_id = $id;
    }
    public function render()
    {

        $store = Store::find($this->store_id);

        $products = Product::where('store_id', $store->id)->get();

        $categories = CategoryPartner::with('products')->where('store_id', $store->id)->whereHas('products')->get();

        $promotions = Product::where('store_id', $store->id)->where('discount', '>', 0)->get();

        if(count($promotions) > 0){
            $this->promotions_area = true;
        }else{
            $this->promotions_area = false;
        }
        $video = "https://www.youtube.com/watch?v=DhGoIb5oS-M";
        return view('livewire.marketplace.store-component', ['store'=>$store, 'products' => $products, 'categories' => $categories, 'video' => $video]);
    }

    public function showProduct($product_id)
    {

        $product = Product::find($product_id);
        $this->product_id = $product_id;
        $this->product_image = $product->image;
        $this->product_category = $product->category->name;
        $this->product_name = $product->name;
        $this->product_discount = $product->discount;
        $this->product_price = $product->price;
        $this->product_description = $product->description;


    }
    public function resetModal()
    {
        $this->product_qtd = 1;
    }

    public function subQtd()
    {
        if($this->product_qtd > 1){
            --$this->product_qtd;
        }
    }

    public function addQtd()
    {
        ++$this->product_qtd;
    }
    public function addCart($product_id)
    {
       // dd($product_id);

        $user = Auth::user();
        $cart_id = Cart::where('user_id', $user->id)/* ->where('status', 0) */->max('cart_id');
        if($cart_id == null){
            dd(1);
            $cart_id = 0;
        }
        //dd($cart_id);
        $cart = Cart::where('user_id', $user->id)->where('status', 0)->get();
        //dd($cart);

        if($this->product_discount != 0){
            //dd(2);
            $price = $this->product_discount;
        }else{
            //dd(3);
            $price = $this->product_price;
        }
        if($user){
            //dd(4);
            /* se ja existe um carrinho aberto e qual é a loja... se for da mesma loja pode lançar se não mandar um aviso */
            /* verificar se o mesmo produto ja foi lançado no carrinho, se já somente acrescentar a qtd */
            if(count($cart) > 0){
                //dd(5);
                if($cart->first()->store_id == $this->store_id){
                    //dd(6);
                    $cart_detail = CartDetails::where('product_id',$product_id)->where('cart_id', $cart_id)->first();
                    //dd($cart_detail);
                    if($cart_detail){ // <- aqui tem um erro de array
                        //dd(7);

                        //dd($cart_detail->qtd);
                       $cart_detail->update([
                            'qtd' => $this->product_qtd + $cart_detail->qtd,
                            'total' => ($this->product_qtd + $cart_detail->qtd) * $price,
                            /* 'commit'*/
                            ]);
                            session()->flash('message','Produto adicionado no carrinho!');
                            $this->dispatchBrowserEvent('close-modal');
                            $this->dispatchBrowserEvent('close-alert');
                            //dd($cart_detail);
                    }else{
                        //dd(8);
                        /* dd($cart->first()->details->first()->product_id); */
                            CartDetails::create([
                                'cart_id' => $cart_id,
                                'store_id' => $this->store_id,
                                'product_id' => $this->product_id,
                                'qtd' => $this->product_qtd,
                                'price'=> $price,
                                'total' => $this->product_qtd * $price,
                                /* 'commit'*/
                                ]);
                                session()->flash('message','Produto adicionado no carrinho!');
                                $this->dispatchBrowserEvent('close-modal');
                                $this->dispatchBrowserEvent('close-alert');

                    }
                }else{
                    dd(9);
                    $this->dispatchBrowserEvent('close-modal');
                    $this->dispatchBrowserEvent('open-modal');

                   //dd("existe e é uma loja diferente");
                }
            }else{
                //dd(10);
                    $cart = Cart::create([
                        'cart_id' => ++$cart_id,
                        'user_id' => $user->id,
                        'store_id' => $this->store_id,
                        ]);

                        CartDetails::create([
                        'cart_id' => $cart->cart_id,
                        'store_id' => $this->store_id,
                        'product_id' => $this->product_id,
                        'qtd' => $this->product_qtd,
                        'price'=> $price,
                        'total' => $this->product_qtd * $price,
                        /* 'commit'*/
                        ]);

                        session()->flash('message','Produto adicionado no carrinho!');
                        $this->dispatchBrowserEvent('close-modal');
                        $this->dispatchBrowserEvent('close-alert');
                    }

        }else{
            dd(11);
            return redirect()->route('login');
        }
        //dd(12);
        $this->resetModal();
    }

    public function favorite($product_id)
    {
        $favorite_product = Product::find($product_id);

        if(isset($favorite_product->Favorite)){
            $favorite_product->Favorite->delete();
        }else{
            FavoriteProduct::create([
                'user_id' => Auth::user()->id,
                'store_id' => $this->store_id,
                'product_id' => $product_id,
            ]);
        }

    }

    public function deleteCart($product_id)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('status', 0)->first();

        for($i = 0; count($cart->Details) > $i ; ++$i){
            $cart->Details[$i]->delete();
        }
        $cart->delete();
        $this->addCart($product_id);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delivery($item)
    {
        $this->dispatchBrowserEvent('close-modal');
        session()->put(['delivery' => $item]);
    }
}

/*
PROTOCOLO VIVO AGENDAMENTO TECNICO DAS 13:30 16:00H
210920223421740 */
