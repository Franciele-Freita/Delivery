<?php

namespace App\Http\Livewire\Partner\Requests;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequestComponent extends Component
{
    public $new, $now;
    public function render()
    {
        $purchases = Purchase::where('store_id', Auth::guard('partner')->user()->stores->first()->id)->get();
        //dd($purchases->count());
        $this->now = $purchases->count();

        if( $this->now > $this->new){
            $this->dispatchBrowserEvent('play-bip');
            $this->new = $this->now;
        }
        return view('livewire.partner.requests.request-component', ['purchases' => $purchases])->layout('layouts.painel-partner');
    }

}
