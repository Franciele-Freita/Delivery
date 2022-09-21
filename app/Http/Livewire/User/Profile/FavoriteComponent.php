<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\FavoriteProduct;
use App\Models\FavoriteStore;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteComponent extends Component
{
    public $store_id, $product_id, $product_image, $product_category, $product_name, $product_discount, $product_price, $product_description, $product_qtd = 1, $store_fantasy_name;

    public function render()
    {
        $favorite_stores = FavoriteStore::where('user_id', Auth::user()->id)->get();
        $favorite_products = FavoriteProduct::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.favorite-component', ['favorite_stores' => $favorite_stores, 'favorite_products' => $favorite_products]);
    }

    public function showProduct($favorite_product_id)
    {
        $product = Product::find($favorite_product_id);

        $this->store_id = $product->Store->id;
        $this->store_fantasy_name = $product->Store->fantasy_name;

        $this->product_id = $favorite_product_id;
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
        $user = Auth::user();
        $cart_id = Cart::where('user_id', $user->id)/* ->where('status', 0) */->max('cart_id');
        if($cart_id == null){
            $cart_id = 0;
        }
        //dd($cart_id);
        $cart = Cart::where('user_id', $user->id)->where('status', 0)->get();
        //dd($cart);
        if($user){
            /* se ja existe um carrinho aberto e qual é a loja... se for da mesma loja pode lançar se não mandar um aviso */
            /* verificar se o mesmo produto ja foi lançado no carrinho, se já somente acrescentar a qtd */
            if(count($cart) > 0){
                if($cart->first()->store_id == $this->store_id){
                    CartDetails::create([
                        'cart_id' => $cart_id,
                        'store_id' => $this->store_id,
                        'product_id' => $this->product_id,
                        'qtd' => $this->product_qtd,
                        'price'=> $this->product_price,
                        'total' => $this->product_qtd * $this->product_price,
                        /* 'commit'*/
                        ]);
                        session()->flash('message','Produto adicionado no carrinho!');
                        $this->dispatchBrowserEvent('close-modal');
                        $this->dispatchBrowserEvent('close-alert');
                }else{
                    $this->dispatchBrowserEvent('close-modal');
                    $this->dispatchBrowserEvent('open-modal');
                   //dd("existe e é uma loja diferente");
                }
            }else{
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
                        'price'=> $this->product_price,
                        'total' => $this->product_qtd * $this->product_price,
                        /* 'commit'*/
                        ]);

                        session()->flash('message','Produto adicionado no carrinho!');
                        $this->dispatchBrowserEvent('close-modal');
                        $this->dispatchBrowserEvent('close-alert');
                    }

        }else{
            return redirect()->route('login');
        }
    }
    public function favoriteProduct($product_id)
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
    public function favoriteStore($store_id)
    {

        $favorite_store = Store::find($store_id);

        if(isset($favorite_store->Favorite)){
            $favorite_store->Favorite->delete();
        }else{
            FavoriteStore::create([
                'user_id' => Auth::user()->id,
                'store_id' => $favorite_store->id,
            ]);
        }

    }

}
