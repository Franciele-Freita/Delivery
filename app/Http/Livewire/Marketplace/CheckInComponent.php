<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\PurchaseStatus;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckInComponent extends Component
{
    public $cart_id;
    public $address_id, $payment_id;
    public function mount($carts_id)
    {
        $this->cart_id = $carts_id;
    }
    public function render()
    {

        $user = Auth::user();

        $cart = Cart::find($this->cart_id);
        if( $cart->status == 1){
            $cart = null;
        }
        //dd($cart);
        $stores = Store::with(['cart' => function($qry) use($user) {return $qry->where('user_id', $user->id);}])->whereHas('cart')->get();

        if((session()->has('address'))){
            $address_id = session()->get('address');
            $address = Address::find($address_id);
        }else{
            //$address = Address::where('user_id', $user->id)->first();
            $address = Address::where('user_id', $user->id)->where('main' , true)->first();
        }

        $paymentForms = Payment::orderBy('id')->get();

        //dd(session()->all());

        return view('livewire.marketplace.check-in-component', ['stores' => $stores, 'cart' => $cart, 'user' => $user, 'address' => $address, 'paymentForms' => $paymentForms]);
    }

    public function selAddress($address_id)
    {
        $this->address_id = $address_id;

        session()->put([
            'address' => $address_id,
        ]);
        //dd(session()->get('address'));
        $this->dispatchBrowserEvent('close-modal');
    }

    public function selPaymentForm($payment_id)
    {
        session()->put([
            'payment' => $payment_id,
        ]);
    }

    public function saveRequest()
    {
        /* session()->forget('payment');
        session()->save(); */
        if(!session()->has('payment')){
            session()->flash('message','Antes de prosseguir selecione uma forma de pagamento!');
        }else{
        $user = Auth::user();
        $cart = Cart::find($this->cart_id);
        $purchase_id = Purchase::where('store_id', $cart->store_id)->max('purchase_id');
        if($purchase_id == null){
            $purchase_id = 1;
        }
        if(session()->has('address')){
            $address_id = session()->get('address');
        }else{
            $address_id = Address::where('user_id', $user->id)->where('main' , true)->first()->id;
        }

        //$payment_id = session()->get('payment');
        $purchase = Purchase::create([
            'purchase_id' => ++$purchase_id,
            'cart_id' => $cart->cart_id,
            'user_id' => $user->id,
            'store_id' => $cart->store_id,
            'payment_id' => session()->get('payment'),
            'address_id' => $address_id,
        ]);

        Cart::where('id', $this->cart_id)->update([
            'status' => 1,
        ]);

        PurchaseStatus::create([
            'purchase_id' => $purchase->id,
            'status_id' => 1,
        ]);

        redirect()->route('marketplace.index');
        session()->forget('payment');
        session()->forget('address');
        session()->save();
        }
        /*
        se não ouver session address usar o endereço principal
        id do endereço
        id da forma de pagamento
        id do cart
        e detalhes de cart

        trazer o carte para finalizado
        */
    }

    public function resetModal()
    {
        # code...
    }

}
