<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\CategoryPartner;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class StoreComponent extends Component
{
    public $store_id, $promotions_area,$product_id, $product_image, $product_category, $product_name, $product_discount, $product_price, $product_description, $product_qtd = 1, $cart = [], $teste;
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
        return view('livewire.marketplace.store-component', ['store'=>$store, 'products' => $products, 'categories' => $categories]);
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
    public function teste($product_id)
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
}
