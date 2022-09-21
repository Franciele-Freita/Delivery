<?php

namespace App\Http\Livewire\Partner\Requests;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequestComponent extends Component
{
    public function render()
    {
        $purchases = Purchase::where('store_id', Auth::guard('partner')->user()->stores->first()->id)->get();
        return view('livewire.partner.requests.request-component', ['purchases' => $purchases])->layout('layouts.painel-partner');
    }

/*     public function completeOrder()
    {
    Order::where('id', $id)->update(['status', 'completed']);

    $this->emit('orderCompleted');
    } */

}
