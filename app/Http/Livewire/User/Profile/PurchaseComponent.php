<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PurchaseComponent extends Component
{
    public function render()
    {
        $user = Auth::user();
        $purchases = Purchase::where('user_id', $user->id)->get();
        return view('livewire.user.profile.purchase-component', ['purchases' => $purchases]);
    }
}
