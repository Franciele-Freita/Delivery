<?php

namespace App\Http\Livewire\Marketplace\Modal;

use App\Models\Product;
use App\Models\Store;
use Livewire\Component;

class ProductDetailsComponent extends Component
{
    public $product_id, $product, $store, $status;

    public function render()
    {
        $product = Product::find(1);
        $store = Store::find(2);
        //$status = Sta
        return view('livewire.marketplace.modal.product-details-component', ['product' => $product, 'store' => $store/* , 'status' => $status */] );
    }
}
