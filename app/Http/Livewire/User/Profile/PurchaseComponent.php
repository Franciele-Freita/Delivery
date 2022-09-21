<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PurchaseComponent extends Component
{
    public $p_id = null;
    public $store_name, $product_name;

    public function render()
    {

        $selPurchase = Purchase::where('id', $this->p_id)->get();
        $user = Auth::user();
        $purchases = Purchase::where('user_id', $user->id)->get();
        return view('livewire.user.profile.purchase-component', ['purchases' => $purchases, 'selPurchase' => $selPurchase]);
    }
    public function showPurchaseDetails($purchase_id)
    {

        $this->p_id = $purchase_id;
        /* $selPurchase = Purchase::find($purchase_id);

        $this->store_name = $selPurchase->store->fantasy_name;
        $this->product_name = $selPurchase->Details; */

    }

}
